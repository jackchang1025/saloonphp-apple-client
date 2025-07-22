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

// 辅助函数：创建响应对象用于测试
function createBasicTestResponse(string $body, int $status): \Saloon\Http\Response
{
    $connector = new BasicTestConnector();
    $request = new BasicTestRequest();
    
    $mockClient = new MockClient([
        BasicTestRequest::class => MockResponse::make(body: $body, status: $status),
    ]);
    
    $connector->withMockClient($mockClient);
    
    return $connector->send($request);
}

// 测试 isProxyConnectResponse 静态方法的各种场景
it('correctly identifies proxy connect response with status 200 and connection established text', function () {
    $response = createBasicTestResponse('HTTP/1.1 200 Connection Established', 200);
    
    $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);
    
    expect($result)->toBe(true);
});

it('correctly identifies proxy connect response with uppercase text', function () {
    $response = createBasicTestResponse('HTTP/1.1 200 CONNECTION ESTABLISHED', 200);
    
    $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);
    
    expect($result)->toBe(true);
});

it('returns false when status is not 200 even with connection established text', function () {
    $response = createBasicTestResponse('HTTP/1.1 200 Connection Established', 404);
    
    $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);
    
    expect($result)->toBe(false);
});

it('returns false when status is 200 but no connection established text', function () {
    $response = createBasicTestResponse('{"success": true}', 200);
    
    $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);
    
    expect($result)->toBe(false);
});

it('returns false when response body is empty', function () {
    $response = createBasicTestResponse('', 200);
    
    $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);
    
    expect($result)->toBe(false);
});

it('can create exception with response and retrieve it', function () {
    $response = createBasicTestResponse('HTTP/1.1 200 Connection Established', 200);
    
    $exception = new ProxyConnectEstablishedException($response);
    
    expect($exception instanceof \Saloon\Exceptions\Request\RequestException)->toBe(true);
    expect($exception->getResponse())->toBe($response);
});

it('works with real world proxy response format', function () {
    $proxyResponse = 'Proxy-Agent: squid/3.5.20
HTTP/1.1 200 Connection Established
Content-Length: 0

';
    
    $response = createBasicTestResponse($proxyResponse, 200);
    
    $result = ProxyConnectEstablishedException::isProxyConnectResponse($response);
    
    expect($result)->toBe(true);
}); 