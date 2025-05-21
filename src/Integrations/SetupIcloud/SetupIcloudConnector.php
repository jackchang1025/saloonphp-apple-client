<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources\FamilyResources;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources\SetupWsResources;

class SetupIcloudConnector extends AppleConnector
{
    public function defaultHeaders(): array
    {
        return [
            'Accept' => '*/*',
            'Accept-Encoding' => 'gzip, deflate, br, zstd',
            'Host' => 'setup.icloud.com',
            'Connection' => 'keep-alive',
            'Origin' => $this->resolveBaseUrl(),
            'Referer' => $this->resolveBaseUrl(),
            // 'Referer'                => 'https://setup.icloud.com/setup/mac/family/addFamilyMemberUI',
            // 'X-Requested-With'       => 'XMLHttpRequest',
            'User-Agent' => $this->appleId()->browser()->userAgent,
            'Proxy-Connection' => 'keep-alive',

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

    public function setupWsResources(): SetupWsResources
    {
        return new SetupWsResources($this);
    }
}
