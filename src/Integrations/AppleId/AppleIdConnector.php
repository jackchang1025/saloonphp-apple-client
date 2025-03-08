<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\AccountManagerResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\BootstrapResources;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\PaymentResources;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\SecurityDevicesResources;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\SecurityPhoneResources;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\AccountResource;

class AppleIdConnector extends AppleConnector
{
    public function resolveBaseUrl(): string
    {
        return 'https://appleid.apple.com';
    }

    public function defaultHeaderSynchronizes(): array
    {
        return ['scnt'];
    }

    protected function defaultHeaders(): array
    {
        $defaultHeaders = [
            'Connection' => 'Keep-Alive',
            // 'Content-Type' => 'application/json',
            'Accept' => 'application/json, text/plain, */*',
            'Accept-Language' => 'en-US,en;q=0.9,zh-CN;q=0.8,zh;q=0.7',
            // 'X-Apple-I-Request-Context' => 'ca',
            // 'X-Apple-I-TimeZone' => 'Asia/Shanghai',
            'Sec-Fetch-Site' => 'same-origin',
            'Sec-Fetch-Mode' => 'cors',
            'Sec-Fetch-Dest' => 'empty',
            'Referer' => $this->resolveBaseUrl(),
            'Origin' => $this->resolveBaseUrl(),
            'Host' => 'appleid.apple.com',
            'User-Agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/131.0.6778.73 Mobile/15E148 Safari/604.1',
            'X-Apple-I-FD-Client-Info' => json_encode([
                "U" => "Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/131.0.6778.73 Mobile/15E148 Safari/604.1",
                "L" => 'en_US',
                "Z" => "GMT+08:00",
                "V" => "1.1",
                "F" => "",
            ]),
        ];

        return array_merge($defaultHeaders, $this->config()->get('headers', []));
    }

    public function getPaymentResources(): PaymentResources
    {
        return new PaymentResources($this);
    }

    public function getAuthenticateResources(): AuthenticateResources
    {
        return new AuthenticateResources($this);
    }

    public function getBootstrapResources(): BootstrapResources
    {
        return new BootstrapResources($this);
    }

    public function getSecurityDevicesResources(): SecurityDevicesResources
    {
        return new SecurityDevicesResources($this);
    }

    public function getSecurityPhoneResources(): SecurityPhoneResources
    {
        return new SecurityPhoneResources($this);
    }

    public function getAccountManagerResources(): AccountManagerResource
    {
        return new AccountManagerResource($this);
    }

    public function getAccountResource(): AccountResource
    {
        return new AccountResource($this);
    }
}
