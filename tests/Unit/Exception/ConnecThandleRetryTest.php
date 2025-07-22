<?php

use Saloon\Enums\Method;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use Weijiajia\SaloonphpAppleClient\Exception\ProxyConnectEstablishedException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

// 重试测试连接器 - 模拟实际的重试行为
class RetryTestConnector extends Connector
{
    public ?int $tries = 3;

    public function resolveBaseUrl(): string
    {
        return 'https://example.com';
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        // 只对 ProxyConnectEstablishedException 进行重试
        return $exception instanceof ProxyConnectEstablishedException;
    }
}

class RetryTestRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/test';
    }
}

// 辅助函数：创建模拟的响应对象
function createMockResponse(string $reasonPhrase, int $status = 200): \Saloon\Http\Response
{
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn($reasonPhrase);
    $mockPsrResponse->shouldReceive('getStatusCode')->andReturn($status);

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn($status);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);
    $mockResponse->shouldReceive('body')->andReturn('Mock response body'); // RequestException 需要这个方法
    $mockResponse->shouldReceive('json')->andReturn(['mock' => 'data']); // 可选：如果需要 JSON 数据

    return $mockResponse;
}

// 测试 handleRetry 方法的基本功能
it('handleRetry returns true for ProxyConnectEstablishedException', function () {
    $connector = new RetryTestConnector();
    $request = new RetryTestRequest();

    // 创建一个带有 "Connection Established" reason phrase 的响应
    $response = createMockResponse('Connection Established', 200);
    $exception = new ProxyConnectEstablishedException($response);

    // 测试 handleRetry 方法
    $shouldRetry = $connector->handleRetry($exception, $request);

    expect($shouldRetry)->toBe(true);
});

it('handleRetry returns false for other RequestException types', function () {
    $connector = new RetryTestConnector();
    $request = new RetryTestRequest();

    // 创建一个普通的服务器错误响应
    $response = createMockResponse('Internal Server Error', 500);
    $exception = new \Saloon\Exceptions\Request\ServerException($response);

    // 测试 handleRetry 方法
    $shouldRetry = $connector->handleRetry($exception, $request);

    expect($shouldRetry)->toBe(false);
});

it('validates connector retry configuration', function () {
    $connector = new RetryTestConnector();

    expect($connector->tries)->toBe(3);
});

it('correctly identifies proxy connect responses using reason phrase', function () {
    // 直接测试检测逻辑
    $testCases = [
        ['Connection Established', 200, true],
        ['CONNECTION ESTABLISHED', 200, true],
        ['connection established', 200, true],
        ['Tunnel established', 200, false], // 不匹配
        ['OK', 200, false],
        ['Connection Established', 404, false], // 状态码不对
        ['', 200, false], // 空 reason phrase
    ];

    foreach ($testCases as [$reasonPhrase, $status, $expected]) {
        $response = createMockResponse($reasonPhrase, $status);
        $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);

        expect($result)->toBe(
            $expected,
            "Failed for reason phrase: '$reasonPhrase', status: $status"
        );
    }
});

it('validates exception creation and properties', function () {
    // 测试异常的创建和属性
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection Established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);
    $mockResponse->shouldReceive('body')->andReturn('Mock response body');

    $exception = new ProxyConnectEstablishedException($mockResponse);

    // 验证异常类型
    expect($exception)->toBeInstanceOf(ProxyConnectEstablishedException::class);
    expect($exception)->toBeInstanceOf(\Saloon\Exceptions\Request\RequestException::class);

    // 验证异常属性
    expect($exception->getResponse())->toBe($mockResponse);
});

it('demonstrates basic retry logic with simple middleware', function () {
    // 简化的重试逻辑演示
    $connector = new RetryTestConnector();
    $attemptCount = 0;

    // 统计请求次数
    $connector->middleware()->onRequest(function () use (&$attemptCount) {
        $attemptCount++;
    });

    // 创建一个成功的响应
    $mockClient = new MockClient([
        RetryTestRequest::class => MockResponse::make(['success' => true], 200)
    ]);

    $connector->withMockClient($mockClient);
    $request = new RetryTestRequest();
    $response = $connector->send($request);

    // 验证基本功能
    expect($attemptCount)->toBe(1);
    expect($response->json()['success'])->toBe(true);
    expect($response->status())->toBe(200);
});

it('validates handleRetry method behavior with different exception types', function () {
    $connector = new RetryTestConnector();
    $request = new RetryTestRequest();

    // 测试各种异常类型
    $exceptionTests = [
        [ProxyConnectEstablishedException::class, true],
        [\Saloon\Exceptions\Request\ServerException::class, false],
        [\Saloon\Exceptions\Request\ClientException::class, false],
        [\Saloon\Exceptions\Request\RequestException::class, false],
    ];

    foreach ($exceptionTests as [$exceptionClass, $expected]) {
        $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
        $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Test Response');

        $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
        $mockResponse->shouldReceive('status')->andReturn(200);
        $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);
        $mockResponse->shouldReceive('body')->andReturn('Test response body');

        $exception = new $exceptionClass($mockResponse);

        $shouldRetry = $connector->handleRetry($exception, $request);
        expect($shouldRetry)->toBe(
            $expected,
            "handleRetry failed for exception: $exceptionClass"
        );
    }
});

it('demonstrates real-world proxy detection scenario', function () {
    // 演示如何在实际应用中使用 ProxyConnectEstablishedException

    // 模拟各种代理响应的 reason phrase
    $proxyResponsePhrases = [
        'Connection established',
        'Connection Established',
        'CONNECTION ESTABLISHED',
        'Proxy connection established',
        'HTTP tunnel established'
    ];

    foreach ($proxyResponsePhrases as $phrase) {
        $response = createMockResponse($phrase, 200);

        // 检查是否为代理连接响应
        $isProxyResponse = ProxyConnectEstablishedException::isProxyConnectResponse($response);

        if ($isProxyResponse) {
            // 在实际应用中，这里会抛出异常触发重试
            // 为异常创建添加必要的 body() 期望
            $response->shouldReceive('body')->andReturn('Proxy response body');

            $exception = new ProxyConnectEstablishedException($response);
            expect($exception)->toBeInstanceOf(ProxyConnectEstablishedException::class);

            // 验证重试逻辑会处理这个异常
            $connector = new RetryTestConnector();
            $request = new RetryTestRequest();
            $shouldRetry = $connector->handleRetry($exception, $request);
            expect($shouldRetry)->toBe(true);
        }
    }
});

it('validates connector inheritance and configuration', function () {
    $connector = new RetryTestConnector();

    // 验证连接器的基本配置
    expect($connector)->toBeInstanceOf(RetryTestConnector::class);
    expect($connector)->toBeInstanceOf(\Saloon\Http\Connector::class);
    expect($connector->tries)->toBe(3);
    expect($connector->resolveBaseUrl())->toBe('https://example.com');
});

it('demonstrates exception handling patterns', function () {
    // 演示异常处理模式
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection Established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);
    $mockResponse->shouldReceive('body')->andReturn('Mock response body');

    // 创建异常
    $exception = new ProxyConnectEstablishedException($mockResponse);

    // 验证异常信息
    expect($exception->getMessage())->toBeString();
    expect($exception->getResponse())->toBe($mockResponse);

    // 验证异常可以被正确捕获
    $caught = false;
    try {
        throw $exception;
    } catch (ProxyConnectEstablishedException $e) {
        $caught = true;
        expect($e)->toBe($exception);
    } catch (\Exception $e) {
        // 不应该到这里
        expect(false)->toBe(true, 'Exception should be caught as ProxyConnectEstablishedException');
    }

    expect($caught)->toBe(true);
});

it('validates isProxyConnectResponse static method edge cases', function () {
    // 测试 isProxyConnectResponse 的边界情况
    $edgeCases = [
        ['Connection Established', 200, true],
        ['connection established', 200, true],
        ['HTTP/1.1 200 Connection Established', 200, true],
        ['Proxy-Connection established', 200, true],
        ['Connection establishment failed', 200, false],
        ['established connection', 200, false],
        ['Connect established', 200, false],
        ['Connection Establish', 200, false],
        ['', 200, false],
        ['Connection Established', 404, false],
        ['Connection Established', 500, false],
    ];

    foreach ($edgeCases as [$reasonPhrase, $status, $expected]) {
        $response = createMockResponse($reasonPhrase, $status);
        $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);

        expect($result)->toBe(
            $expected,
            "Edge case failed for: '$reasonPhrase' (status: $status)"
        );
    }
});

it('integrates with real Saloon MockClient responses', function () {
    // 测试与真实 Saloon MockClient 的集成
    $connector = new RetryTestConnector();
    $request = new RetryTestRequest();

    // 创建各种类型的模拟响应
    $responses = [
        MockResponse::make(['data' => 'success'], 200),
        MockResponse::make(['error' => 'Not Found'], 404),
        MockResponse::make(['error' => 'Server Error'], 500),
    ];

    foreach ($responses as $mockResponse) {
        $mockClient = new MockClient([
            RetryTestRequest::class => $mockResponse
        ]);

        $connector->withMockClient($mockClient);

        try {
            $realResponse = $connector->send($request);

            // 验证我们可以使用真实的 Saloon 响应对象
            expect($realResponse)->toBeInstanceOf(\Saloon\Http\Response::class);
            expect($realResponse->status())->toBeInt();
        } catch (\Exception $e) {
            // 某些状态码会自动抛出异常，这是正常的
            expect($e)->toBeInstanceOf(\Saloon\Exceptions\Request\RequestException::class);
        }
    }
});
