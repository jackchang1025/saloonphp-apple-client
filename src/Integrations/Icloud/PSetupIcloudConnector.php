<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources\PSetupIcloudResources;

class PSetupIcloudConnector extends AppleConnector
{
    public function defaultHeaders(): array
    {
        return [
            'Host'                 => 'p214-setup.icloud.com.cn',
            'Accept-Encoding'      => 'gzip',
            'Referer'              => 'https://setup.icloud.com/setup/mac/family/addFamilyMemberUI',
            'X-Requested-With'     => 'XMLHttpRequest',
            'User-Agent'           => $this->apple()->browser()->userAgent,
            'Proxy-Connection'     => 'keep-alive',
            'Origin'               => 'https://www.icloud.com',
            'X-MMe-Client-Info'    => '<MacBook Pro> <Mac OS X;10.10.0;14A314h> <webclient/731eb0905570 (com.apple.systempreferences/14.0)>',
            'Connection'           => 'keep-alive',
            'X-SproutCore-Version' => '1.6.0',
            'Accept-Language'      => $this->apple()->browser()->language,
        ];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://p214-setup.icloud.com';
    }

    public function getPSetupIcloudResources(): PSetupIcloudResources
    {
        return new PSetupIcloudResources($this);
    }
}
