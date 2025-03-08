<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Resources\AuthenticateResources;

class WebIcloudConnector extends AppleConnector
{
    public function __construct(
        readonly protected string $baseUrl
    ) {

    }

    public function defaultHeaders(): array
    {
        $defaultHeaders = [
            'Host'                 => $this->getHost(),
            'Accept-Encoding'      => 'gzip',
            'Referer'              => $this->originAndReferer(),
            'Origin'               => $this->originAndReferer(),
            'X-Requested-With'     => 'XMLHttpRequest',
            'User-Agent'           => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10) AppleWebKit/600.1.3 (KHTML, like Gecko)',
            'Proxy-Connection'     => 'keep-alive',
            'X-MMe-Client-Info'    => '<MacBook Pro> <Mac OS X;10.10.0;14A314h> <webclient/731eb0905570 (com.apple.systempreferences/14.0)>',
            'Connection'           => 'keep-alive',
            'X-SproutCore-Version' => '1.6.0',
            'Accept-Language'      => 'zh-cn',
            'user-agent'           => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
            'sec-ch-ua'            => 'Google Chrome;v="131", "Chromium";v="131", "Not_A Brand";v="24"',
            'sec-ch-ua-mobile'     => '?0',
            'sec-ch-ua-platform'   => '"Windows"',
            'sec-fetch-dest'       => 'empty',
            'sec-fetch-mode'       => 'cors',
            'sec-fetch-site'       => 'same-site',
        ];

        return array_merge($defaultHeaders, $this->config()->get('headers', []));
    }

    public function getHost(): string
    {
        // 大陆账号
        if ($this->apple->getAccount()->isCN()) {
            return 'setup.icloud.com.cn';
        }

        // 非大陆账号
        return 'setup.icloud.com';
    }

    public function originAndReferer(): string
    {
        // 大陆账号
        if ($this->apple->getAccount()->isCN()) {
            return 'https://www.icloud.com.cn';
        }

        // 非大陆账号
        return 'https://www.icloud.com';
    }

    public function resolveBaseUrl(): string
    {
        // 大陆账号
        if ($this->apple->getAccount()->isCN()) {
            return 'https://setup.icloud.com.cn';
        }

        // 非大陆账号
        return 'https://setup.icloud.com';
    }


    public function getAuthenticateResources(): AuthenticateResources
    {
        return new AuthenticateResources($this);
    }
}
