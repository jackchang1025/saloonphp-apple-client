<?php

use Saloon\Enums\Method;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use Weijiajia\SaloonphpAppleClient\Exception\ProxyConnectEstablishedException;

// 简单的测试连接器
class BasicTestConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://example.com';
    }
}

class BasicTestRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/test';
    }
}

// 简化的测试方法：直接测试静态方法而不是创建复杂的响应对象
it('correctly identifies proxy connect response with status 200 and "Connection Established" reason phrase', function () {
    // 直接创建一个模拟的响应对象进行测试
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection Established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(true);
});

it('correctly identifies proxy connect response with uppercase reason phrase', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('CONNECTION ESTABLISHED');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(true);
});

it('correctly identifies proxy connect response with mixed case reason phrase', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(true);
});

it('returns false when status is not 200 even with "Connection Established" reason phrase', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection Established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(404);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(false);
});

it('returns false when status is 200 but reason phrase does not contain "connection established"', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('OK');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(false);
});

it('returns false when status is 200 but reason phrase is empty', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(false);
});

it('returns false when reason phrase contains partial match but not complete phrase', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('connection');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

    $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);

    expect($result)->toBe(false);
});

it('can create exception with response and retrieve it', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection Established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);
    $mockResponse->shouldReceive('body')->andReturn('Mock response body'); // RequestException 需要这个方法

    $exception = new ProxyConnectEstablishedException($mockResponse);

    expect($exception instanceof \Saloon\Exceptions\Request\RequestException)->toBe(true);
    expect($exception->getResponse())->toBe($mockResponse);
});

it('works with real world proxy response scenarios', function () {
    // 模拟各种真实的代理响应格式
    $realWorldReasonPhrases = [
        'Connection established',
        'Connection Established',
        'CONNECTION ESTABLISHED',
        'Tunnel established',
        'connection established',
    ];

    foreach ($realWorldReasonPhrases as $reasonPhrase) {
        $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
        $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn($reasonPhrase);

        $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
        $mockResponse->shouldReceive('status')->andReturn(200);
        $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

        $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);
        $expected = str_contains(strtolower($reasonPhrase), 'connection established');
        expect($result)->toBe($expected, "Failed for reason phrase: '$reasonPhrase'");
    }
});

it('validates exception inheritance and properties', function () {
    $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
    $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn('Connection Established');

    $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
    $mockResponse->shouldReceive('status')->andReturn(200);
    $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);
    $mockResponse->shouldReceive('body')->andReturn('Mock response body'); // RequestException 需要这个方法

    $exception = new ProxyConnectEstablishedException($mockResponse);

    // 验证异常类型层次结构
    expect($exception)->toBeInstanceOf(ProxyConnectEstablishedException::class);
    expect($exception)->toBeInstanceOf(\Saloon\Exceptions\Request\RequestException::class);
    expect($exception)->toBeInstanceOf(\Exception::class);

    // 验证异常包含响应信息
    expect($exception->getResponse())->toBe($mockResponse);
});

it('demonstrates edge cases and boundary conditions', function () {
    // 测试边界条件
    $edgeCases = [
        ['Connection Established', 200, true],
        ['connection established', 200, true],
        ['HTTP/1.1 200 Connection Established', 200, true], // 包含协议信息
        ['Proxy-Connection established', 200, true], // 带前缀
        ['Connection establishment failed', 200, false], // 相似但不匹配
        ['established connection', 200, false], // 单词顺序不对
        ['Connect established', 200, false], // 缺少 "ion"
        ['Connection Establish', 200, false], // 缺少 "ed"
    ];

    foreach ($edgeCases as [$reasonPhrase, $status, $expected]) {
        $mockPsrResponse = \Mockery::mock(\Psr\Http\Message\ResponseInterface::class);
        $mockPsrResponse->shouldReceive('getReasonPhrase')->andReturn($reasonPhrase);

        $mockResponse = \Mockery::mock(\Saloon\Http\Response::class);
        $mockResponse->shouldReceive('status')->andReturn($status);
        $mockResponse->shouldReceive('getPsrResponse')->andReturn($mockPsrResponse);

        $result = ProxyConnectEstablishedException::isProxyConnectResponse($mockResponse);
        expect($result)->toBe(
            $expected,
            "Edge case failed for: '$reasonPhrase' (status: $status)"
        );
    }
});

it('works with actual Saloon response objects from MockClient', function () {
    // 测试与真实的 Saloon MockClient 响应的集成
    $connector = new BasicTestConnector();
    $request = new BasicTestRequest();

    // 创建一个成功的模拟响应
    $mockClient = new MockClient([
        BasicTestRequest::class => MockResponse::make(['success' => true], 200)
    ]);

    $connector->withMockClient($mockClient);
    $realResponse = $connector->send($request);

    // 验证我们可以使用真实的响应对象
    expect($realResponse)->toBeInstanceOf(\Saloon\Http\Response::class);
    expect($realResponse->status())->toBe(200);
    expect($realResponse->json()['success'])->toBe(true);

    // 注意：由于MockResponse无法设置自定义reason phrase，
    // 这个测试主要验证我们的测试架构与真实Saloon对象的兼容性
});
