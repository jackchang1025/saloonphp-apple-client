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

class TestConnectorForProxyException extends Connector
{
    public ?int $tries = 3;

    public function resolveBaseUrl(): string
    {
        return 'https://example.com';
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        return $exception instanceof ProxyConnectEstablishedException;
    }
}

class TestRequestForProxyException extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/test';
    }
}



it('returns true when response status is 200 and body contains "connection established" in uppercase', function () {
    // 测试大小写不敏感
    $appleConnector = new TestConnectorForProxyException();

    $mockClient = new MockClient([
        TestRequestForProxyException::class => MockResponse::make(body: 'HTTP/1.1 200 CONNECTION ESTABLISHED', status: 200),
    ]);

    $appleConnector->withMockClient($mockClient);

    $request = new TestRequestForProxyException();

    $response = $appleConnector->send($request);

    expect(ProxyConnectEstablishedException::isProxyConnectResponse($response))->toBeTrue();
});

it('retries 3 times when encountering proxy connect responses and succeeds on 4th attempt', function () {
    // 测试重试机制：前3次返回 proxy connect 响应，第4次返回正常响应
    $attemptCount = 0;

    $appleConnector = new TestConnectorForProxyException();
    $appleConnector->tries = 4;

    // 设置中间件来检测 proxy connect 响应并抛出异常（前3次抛出，第4次不抛出）
    $appleConnector->middleware()->onResponse(function (Response $response) use (&$attemptCount) {
        $attemptCount++;
        if (ProxyConnectEstablishedException::isProxyConnectResponse($response) && $attemptCount <= 3) {
            throw new ProxyConnectEstablishedException($response);
        }
    });

    // 创建序列响应：前3次是 proxy connect，第4次是正常响应
    $mockClient = new MockClient([
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 第1次
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 第2次  
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 第3次
        MockResponse::make(body: '{"success": true}', status: 200), // 第4次 - 正常响应
    ]);

    $appleConnector->withMockClient($mockClient);

    $request = new TestRequestForProxyException();

    $response = $appleConnector->send($request);

    // 验证最终得到正常响应，说明重试机制工作正常
    expect($attemptCount)->toBe(4); // 验证确实进行了4次尝试
    expect($response->json()['success'])->toBe(true);
    expect($response->status())->toBe(200);
});

it('retries 3 times and fails when all attempts return proxy connect responses', function () {
    // 测试重试机制：所有4次尝试都返回 proxy connect 响应，最终应该抛出异常
    $appleConnector = new TestConnectorForProxyException();

    // 设置中间件来检测 proxy connect 响应并抛出异常
    $appleConnector->middleware()->onResponse(function (Response $response) {
        if (ProxyConnectEstablishedException::isProxyConnectResponse($response)) {
            throw new ProxyConnectEstablishedException($response);
        }
    });

    // 创建4个 proxy connect 响应
    $mockClient = new MockClient([
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 第1次
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 第2次
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 第3次
    ]);

    $appleConnector->withMockClient($mockClient);

    $request = new TestRequestForProxyException();

    expect(fn() => $appleConnector->send($request))
        ->toThrow(ProxyConnectEstablishedException::class);
});

it('does not retry when handleRetry returns false for other exceptions', function () {
    // 测试当 handleRetry 返回 false 时不会重试
    $appleConnector = new TestConnectorForProxyException();

    // 设置中间件抛出一个不同的异常（不是 ProxyConnectEstablishedException）
    $appleConnector->middleware()->onResponse(function (Response $response) {
        if ($response->status() === 500) {
            throw new \Saloon\Exceptions\Request\ServerException($response);
        }
    });

    $mockClient = new MockClient([
        MockResponse::make(body: 'Server Error', status: 500),
    ]);

    $appleConnector->withMockClient($mockClient);

    $request = new TestRequestForProxyException();

    // 验证立即抛出异常，不会重试
    expect(fn() => $appleConnector->send($request))
        ->toThrow(\Saloon\Exceptions\Request\ServerException::class);
});

it('can track retry attempts using request counter', function () {
    // 测试重试次数统计
    $requestCount = 0;
    $responseCount = 0;

    $appleConnector = new TestConnectorForProxyException();
    $appleConnector->tries = 4;

    // 使用中间件统计请求次数
    $appleConnector->middleware()->onRequest(function (\Saloon\Http\PendingRequest $pendingRequest) use (&$requestCount) {
        $requestCount++;
    });

    // 设置响应中间件来检测 proxy connect 响应并抛出异常（前3次抛出，第4次不抛出）
    $appleConnector->middleware()->onResponse(function (Response $response) use (&$responseCount) {
        $responseCount++;
        if (ProxyConnectEstablishedException::isProxyConnectResponse($response) && $responseCount <= 3) {
            throw new ProxyConnectEstablishedException($response);
        }
    });

    // 前3次返回 proxy connect，第4次返回正常响应
    $mockClient = new MockClient([
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 请求 1
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 请求 2 (重试1)
        MockResponse::make(body: 'HTTP/1.1 200 Connection Established', status: 200), // 请求 3 (重试2)
        MockResponse::make(body: '{"success": true}', status: 200), // 请求 4 (重试3)
    ]);

    $appleConnector->withMockClient($mockClient);

    $request = new TestRequestForProxyException();
    $response = $appleConnector->send($request);

    // 验证总共发送了4次请求（1次初始 + 3次重试）
    expect($requestCount)->toBe(4)
        ->and($response->json())->toBe(['success' => true]);
});
