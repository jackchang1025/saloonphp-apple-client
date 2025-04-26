<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\LocalesResources;

class IcloudConnector extends AppleConnector
{
    public function defaultHeaders(): array
    {

        return [
            'Host'                 => 'www.icloud.com',
            'Accept'               => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Accept-Encoding'      => 'gzip, deflate, br, zstd',
            'Referer'              => 'https://www.icloud.com',
            'Origin'               => 'https://www.icloud.com',
            'upgrade-insecure-requests' => '1',
            'Connection'           => 'keep-alive',
            'user-agent'           => $this->appleId()->browser()->userAgent,
        ];

    }

    public function resolveBaseUrl(): string
    {
        return 'https://www.icloud.com';
    }


    public function getAuthenticateResources(): AuthenticateResources
    {
        return new AuthenticateResources($this);
    }

    public function localesResources(): LocalesResources
    {
        return new LocalesResources($this);
    }

    
}
