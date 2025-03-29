<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Resources\Resources;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecFetch;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecCh;

class FeedBackWsIcloudConnector extends AppleConnector
{
    use HasSecFetch;
    use HasSecCh;


    public function defaultHeaders(): array
    {
        return [
            'Accept'                 => '*/*',
            'Content-Type'           => 'text/plain;charset=UTF-8',
            'Host'                   => 'feedbackws.icloud.com',
            'Accept-Encoding'        => 'gzip, deflate, br, zstd',
            'Referer'                => 'https://www.icloud.com',
            'User-Agent'             => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
            'Origin'                 => 'https://www.icloud.com',
            'Connection'             => 'keep-alive',
            'Cache-Control'          => 'no-cache',
            'Pragma'                 => 'no-cache',

        ];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://feedbackws.icloud.com';
    }


    public function resources(): Resources
    {
        return new Resources($this);
    }
}
