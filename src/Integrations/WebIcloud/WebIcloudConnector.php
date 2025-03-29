<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Resources\LocalesResources;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecFetch;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecCh;

class WebIcloudConnector extends AppleConnector
{
    use HasSecFetch;
    use HasSecCh;
    public function __construct(
        readonly protected string $baseUrl
    ) {

    }

    public function defaultHeaders(): array
    {

        $defaultHeaders = [
            'Host'                 => 'www.icloud.com',
            'Accept'               => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Accept-Encoding'      => 'gzip, deflate, br, zstd',
            'Referer'              => $this->baseUrl,
            'Origin'               => $this->baseUrl,
            'upgrade-insecure-requests' => '1',
            'Connection'           => 'keep-alive',
            'user-agent'           => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
        ];

        return array_merge($defaultHeaders, $this->config()->get('headers', []));
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
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
