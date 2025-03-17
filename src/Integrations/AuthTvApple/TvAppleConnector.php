<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple;

use Saloon\Traits\Plugins\AcceptsJson;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Resources\Resources;

class AuthTvAppleConnector extends AppleConnector
{
    use AcceptsJson;

    public function resolveBaseUrl(): string
    {
        return 'https://auth.tv.apple.com/auth/v1/';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection'                => 'Keep-Alive',
            'X-Apple-I-TimeZone'        => 'Asia/Shanghai',
            'Sec-Fetch-Site'            => 'same-site',
            'Sec-Fetch-Mode'            => 'navigate',
            'Sec-Fetch-Dest'            => 'empty',
            'Sec-Fetch-User'            => '?1',
            'sec-ch-ua'                 => '"Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"',
            'sec-ch-ua-mobile'          => '?0',
            'sec-ch-ua-platform'        => '"Windows"',
            'Host'                      => 'auth.tv.apple.com',
            'Origin'                    => 'https://tv.apple.com',
            'Referer'                   => 'https://tv.apple.com/',
            'User-Agent'                => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',
        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
