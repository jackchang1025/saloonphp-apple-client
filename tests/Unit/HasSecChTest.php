<?php

use Saloon\Enums\Method;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecCh;

// 创建一个测试用的类来使用 HasSecCh trait
class TestConnector extends Connector
{
    use HasSecCh;

    public function resolveBaseUrl(): string
    {
        return 'https://example.com';
    }
}

class TestRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/test';
    }
}

beforeEach(function () {
    $this->connector = new TestConnector();
    $this->request = new TestRequest();

    $mockClient = new MockClient([
        TestRequest::class => MockResponse::make(body: '', status: 200),
    ]);

    $this->connector->withMockClient($mockClient);
});

// 测试不同浏览器的 sec-ch-ua 头部生成
it('create Chrome 134+  sec-ch-ua header', function () {
    // 设置 Chrome 134 的 User-Agent
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36');

    $response = $this->connector->send($this->request);

    // 验证生成的头部
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBe('"Not:A-Brand";v="24", "Chromium";v="134", "Google Chrome";v="134"');
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-mobile'))->toBe('?0');
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBe('"Windows"');
});

it('create Chrome 133  sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBe('"Not(A:Brand";v="99", "Chromium";v="133", "Google Chrome";v="133"');
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBe('"Windows"');
});

it('create Chrome 125  sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBe('"Not_A Brand";v="24", "Chromium";v="125", "Google Chrome";v="125"');
});

it('create Edge 133  sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.2623.0');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBe('"Not(A:Brand";v="99", "Chromium";v="133", "Microsoft Edge";v="133"');
});

it('create Opera 110  sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 OPR/110.0.0.0');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBe('"Opera";v="110", "Not;A Brand";v="99", "Chromium";v="124"');
});

it('non Chromium browser not create sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBeNull();
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-mobile'))->toBeNull();
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBeNull();
});

it('Safari browser not create sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/605.1.15');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBeNull();
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-mobile'))->toBeNull();
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBeNull();
});

it('Android device set correct mobile and platform value', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-mobile'))->toBe('?1');
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBe('"Android"');
});

it('macOS device set correct platform value', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBe('"macOS"');
});

it('not override exist sec-ch-ua header', function () {
    $this->connector->headers()->add('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');

    $response = $this->connector->send($this->request);

    // 预先设置头部
    $this->connector->headers()->add('sec-ch-ua', '自定义值');

    $response = $this->connector->send($this->request);

    // 验证头部未被修改
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBe('自定义值');
});

it('empty User-Agent not create any header', function () {
    // 不设置 User-Agent

    $response = $this->connector->send($this->request);

    expect($response->getPendingRequest()->headers()->get('sec-ch-ua'))->toBeNull();
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-mobile'))->toBeNull();
    expect($response->getPendingRequest()->headers()->get('sec-ch-ua-platform'))->toBeNull();
});
