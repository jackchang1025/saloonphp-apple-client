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
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecCh;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecFetch;
use Weijiajia\SaloonphpAppleClient\Plugins\HasRequestedWith;

class AppleIdConnector extends AppleConnector
{
    use HasSecCh;
    use HasSecFetch;
    use HasRequestedWith;

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
        $defaultHeaders = [
            'Connection' => 'Keep-Alive',
            'Accept' => 'application/json, text/plain, */*',
            'Referer' => $this->resolveBaseUrl(),
            'Origin' => $this->resolveBaseUrl(),
            'Host' => 'appleid.apple.com',
            'X-Apple-Skip-Repair-Attributes' => '[]',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',
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

    public function getRepairResource(): RepairResource
    {
        return new RepairResource($this);
    }
}
