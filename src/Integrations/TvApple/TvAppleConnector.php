<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\TvApple;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\TvApple\Resources\Resources;
class TvAppleConnector extends AppleConnector
{

    public function resolveBaseUrl(): string
    {
        return 'https://tv.apple.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection'                => 'Keep-Alive',
            'Content-Type'              => 'text/html',
            'Accept'                    => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Accept-Language'           => $this->apple()->browser()->language,
            'X-Apple-I-Request-Context' => 'ca',
            'X-Apple-I-TimeZone'        => $this->apple()->browser()->timezone,
            'Upgrade-Insecure-Requests' => '1',
            'Host'                      => 'tv.apple.com',
            'Origin'                    => 'https://tv.apple.com',
            'Referer'                   => 'https://tv.apple.com/',
            'User-Agent'                => $this->apple()->browser()->userAgent,
        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
