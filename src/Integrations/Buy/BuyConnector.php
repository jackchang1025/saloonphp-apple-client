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
            'Accept-Language'           => $this->apple()->browser()->language,
            'X-Apple-I-Request-Context' => 'ca',
            'X-Apple-I-TimeZone'        => $this->apple()->browser()->timezone,
            'Host'                      => 'buy.apps.apple.com',
            'Origin'                    => 'https://apps.apple.com',
            'Referer'                   => 'https://apps.apple.com/',
            'User-Agent'                => $this->apple()->browser()->userAgent,

        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }

}
