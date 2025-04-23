<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Resources\Resources;

class FeedBackWsIcloudConnector extends AppleConnector
{
    public function defaultHeaders(): array
    {
        return [
            'Accept'                 => '*/*',
            'Content-Type'           => 'text/plain;charset=UTF-8',
            'Host'                   => 'feedbackws.icloud.com',
            'Accept-Encoding'        => 'gzip, deflate, br, zstd',
            'Referer'                => 'https://www.icloud.com',
            'User-Agent'             => $this->apple()->browser()->userAgent,
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
