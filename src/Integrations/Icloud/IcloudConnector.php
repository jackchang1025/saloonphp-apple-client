<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud;

use Weijiajia\SaloonphpAppleClient\Apple;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\FamilyResources;
use Saloon\Http\Auth\BasicAuthenticator;

class IcloudConnector extends AppleConnector
{

    public function defaultHeaders(): array
    {
        return [
            'Host'                   => 'setup.icloud.com',
            'Accept-Encoding'        => 'gzip',
            'Referer'                => 'https://setup.icloud.com/setup/mac/family/addFamilyMemberUI',
            'X-Requested-With'       => 'XMLHttpRequest',
            'User-Agent'             => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.3 (KHTML, like Gecko)',
            'Proxy-Connection'       => 'keep-alive',
            'Origin'                 => 'https://setup.icloud.com',
            'X-MMe-Client-Info'      => '<MacBook Pro> <Mac OS X;10.10.0;14A314h> <webclient/731eb0905570 (com.apple.systempreferences/14.0)>',
            'Connection'             => 'keep-alive',
            'X-SproutCore-Version'   => '1.6.0',
            'Accept-Language'        => 'zh-cn',
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
}
