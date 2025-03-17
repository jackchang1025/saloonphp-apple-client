<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple;

use Saloon\Traits\Plugins\AcceptsJson;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Resources\Resources;

class BuyTvAppleConnector extends AppleConnector
{
    use AcceptsJson;

    public function resolveBaseUrl(): string
    {
        return 'https://buy.tv.apple.com/';
    }

    protected function defaultHeaders(): array
    {
        return [
            'accept'                    => '*/*',
            'content-type'              => 'application/x-www-form-urlencoded;charset=UTF-8',
            'accept-encoding'           => 'gzip, deflate, br, zstd',
            'Connection'                => 'Keep-Alive',
            'Sec-Fetch-Site'            => 'same-site',
            'Sec-Fetch-Mode'            => 'cors',
            'Sec-Fetch-Dest'            => 'empty',
            'Sec-Fetch-User'            => '?1',
            'sec-ch-ua'                 => '"Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"',
            'sec-ch-ua-mobile'          => '?0',
            'sec-ch-ua-platform'        => '"Windows"',
            'Host'                      => 'buy.tv.apple.com',
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
