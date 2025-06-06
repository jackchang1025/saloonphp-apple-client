<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Resources\Resources;

class PlayTvAppleConnector extends AppleConnector
{
    public function resolveBaseUrl(): string
    {
        return 'https://play.tv.apple.com/';
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
            'Connection' => 'keep-alive',
            'Host' => 'buy.tv.apple.com',
            'Priority' => 'u=1, i',
            'Origin' => 'https://tv.apple.com',
            'Referer' => 'https://tv.apple.com/',
            'User-Agent' => $this->appleId()->browser()->userAgent,
            'X-Apple-Store-Front' => '143441-1,8', // 143441
        ];
    }
}
