<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\JsLog as JsLogDto;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpCookiePlugin\Contracts\CookieJarInterface;
use Weijiajia\SaloonphpCookiePlugin\HasCookie;

class JsLog extends Request implements HasBody, CookieJarInterface
{
    use HasJsonBody;
    use HasCookie;

    protected Method $method = Method::POST;

    public function __construct(
        public JsLogDto $jsLog,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/appleauth/jslog';
    }

    public function defaultBody(): array
    {
        return $this->jsLog->toArray();
    }

    public function isCookieRequired(): bool
    {
        return false;
    }

    public function defaultHeaders(): array
    {
        return [
            'accept' => 'application/json',
            'accept-encoding' => 'gzip, deflate, br, zstd',
            'cache-control' => 'no-cache',
            'connection' => 'keep-alive',
            'content-type' => 'application/json',
            'host' => 'idmsa.apple.com',
            'origin' => 'https://idmsa.apple.com',
            'pragma' => 'no-cache',
            'referer' => 'https://idmsa.apple.com/',
            'scnt' => '',
            'sec-ch-ua' => '"Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Windows"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'same-origin',
            'x-csrf-token' => '',
        ];
    }
}
