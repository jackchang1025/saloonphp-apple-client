<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Resources\Resources;

class AuthTvAppleConnector extends AppleConnector
{
    public function resolveBaseUrl(): string
    {
        return 'https://auth.tv.apple.com/auth/v1/';
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => '*/*',
            'Accept-Encoding' => 'gzip, deflate, br, zstd',
            'Connection' => 'Keep-Alive',
            'Sec-Fetch-User' => '?1',
            'Host' => 'auth.tv.apple.com',
            'Origin' => 'https://tv.apple.com',
            'Referer' => 'https://tv.apple.com/',
            'Priority' => 'u=1, i',
            'User-Agent' => $this->apple()->browser()->userAgent,
            'X-Apple-Store-Front' => '143441-1,8',
        ];
    }
}
