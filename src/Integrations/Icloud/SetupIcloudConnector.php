<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\FamilyResources;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\SetupWResources;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecFetch;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecCh;

class SetupIcloudConnector extends AppleConnector
{
    use HasSecFetch;
    use HasSecCh;

    public function defaultHeaders(): array
    {
        return [
            'Accept'                 => '*/*',
            'Accept-Encoding'        => 'gzip, deflate, br, zstd',
            'Host'                   => 'setup.icloud.com',
            'Connection'             => 'keep-alive',
            'Origin'                 => $this->resolveBaseUrl(),
            'Referer'                => $this->resolveBaseUrl(),
            // 'Referer'                => 'https://setup.icloud.com/setup/mac/family/addFamilyMemberUI',
            // 'X-Requested-With'       => 'XMLHttpRequest',
            'User-Agent'             => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
            'Proxy-Connection'       => 'keep-alive',
            
            // 'X-MMe-Client-Info'      => '<MacBook Pro> <Mac OS X;10.10.0;14A314h> <webclient/731eb0905570 (com.apple.systempreferences/14.0)>',
            // 'X-SproutCore-Version'   => '1.6.0',
            // 'Accept-Language'        => 'zh-cn',
        ];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://setup.icloud.com';
    }

    public function getFamilyResources(): FamilyResources
    {
        return new FamilyResources($this);
    }

    public function getAuthenticateResources(): AuthenticateResources
    {
        return new AuthenticateResources($this);
    }

    public function setupWResources(): SetupWResources
    {
        return new SetupWResources($this);
    }
}
