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
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources\RepairResource;


class AppleIdConnector extends AppleConnector
{
    

    public function resolveBaseUrl(): string
    {
        return 'https://appleid.apple.com';
    }

    public function defaultHeaderSynchronizes(): array
    {
        return ['scnt','X-Apple-OAuth-Context','X-Apple-Session-Token'];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection' => 'Keep-Alive',
            'Accept' => 'application/json, text/plain, */*',
            'Accept-Encoding' => 'gzip, deflate, br, zstd',
            'Referer' => $this->resolveBaseUrl(),
            'Origin' => $this->resolveBaseUrl(),
            'Host' => 'appleid.apple.com',
            'User-Agent' => $this->appleId()->browser()->userAgent,
            'Accept-Language' => $this->appleId()->browser()->language,
            "X-Apple-I-Timezone" => $this->appleId()->browser()->timezone,
        ];
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

    public function getRepairResource(): RepairResource
    {
        return new RepairResource($this);
    }
}
