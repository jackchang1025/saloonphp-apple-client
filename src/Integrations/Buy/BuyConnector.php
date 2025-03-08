<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;

class BuyConnector extends AppleConnector
{

    public function resolveBaseUrl(): string
    {
        return 'https://buy.apps.apple.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection'                => 'Keep-Alive',
            'Content-Type'              => 'application/json',
            'Accept'                    => 'application/json, text/plain, */*',
            'Accept-Language'           => 'zh-CN,en;q=0.9,zh;q=0.8',
            'X-Apple-I-Request-Context' => 'ca',
            'X-Apple-I-TimeZone'        => 'Asia/Shanghai',
            'Sec-Fetch-Site'            => 'same-origin',
            'Sec-Fetch-Mode'            => 'cors',
            'Sec-Fetch-Dest'            => 'empty',
            'Host'                      => 'buy.apps.apple.com',
            'Origin'                    => 'https://apps.apple.com',
            'Referer'                   => 'https://apps.apple.com/',
            'User-Agent'                => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',

        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }

}
