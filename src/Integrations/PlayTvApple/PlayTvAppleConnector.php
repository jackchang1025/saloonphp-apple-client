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

    protected function defaultHeaders(): array
    {

        return [
            'Accept'                    => '*/*',
            'Accept-Encoding'           => 'gzip, deflate, br, zstd',
            'Connection'                => 'keep-alive',
            'Sec-Fetch-Site'            => 'same-site',
            'Sec-Fetch-Mode'            => 'cors',
            'Sec-Fetch-Dest'            => 'empty',
            // 'Sec-Fetch-User'            => '?1',
            'Sec-ch-ua'                 => '"Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"',
            'Sec-ch-ua-mobile'          => '?0',
            'Sec-ch-ua-platform'        => '"Windows"',
            'Host'                      => 'buy.tv.apple.com',
            'Priority'                  => 'u=1, i',
            'Origin'                    => 'https://tv.apple.com',
            'Referer'                   => 'https://tv.apple.com/',
            'User-Agent'                => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',
            'X-Apple-Store-Front'       => '143441-1,8'//143441
        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
