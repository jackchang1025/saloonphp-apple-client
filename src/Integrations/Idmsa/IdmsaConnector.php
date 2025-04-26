<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources\AuthenticateResources;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources\JsLogResources;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;

class IdmsaConnector extends AppleConnector
{
    public function __construct(AppleId $appleId,protected string $serviceKey,protected string $redirectUri)
    {
        parent::__construct($appleId);
        
    }


    public function defaultHeaderSynchronizes(): array
    {
        return ['X-Apple-ID-Session-Id', 'X-Apple-Auth-Attributes', 'scnt'];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://idmsa.apple.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept'                      => 'application/json, text/javascript, */*; q=0.01',
            'Accept-Encoding'               => 'gzip, deflate, br, zstd',
            'Connection'                  => 'Keep-Alive',
            'Host'                        => 'idmsa.apple.com',
            'Origin'                      => $this->resolveBaseUrl(),
            'Referer'                     => $this->resolveBaseUrl(),
            'User-Agent'                  => $this->appleId()->browser()->userAgent,
            'X-Apple-Widget-Key'            => $this->serviceKey,
            'X-Apple-OAuth-Redirect-URI'   => $this->redirectUri,
            'X-Apple-OAuth-Client-Id'      => $this->serviceKey,
            'X-Apple-OAuth-Client-Type'    => 'firstPartyAuth',
            'X-Requested-With'            => 'XMLHttpRequest',
            'X-Apple-OAuth-Response-Mode' => 'web_message',
            'X-Apple-OAuth-Response-Type' => 'code',
            // 'X-APPLE-HC'                  => '1:12:20240626165907:82794b5d498b7d7dc29740b23971ded5::4824',
            // 'X-Apple-Domain-Id'           => '1',
            
            // 'Priority'                    => 'u=1, i',
        ];
    }

    public function getAuthenticateResources(): AuthenticateResources
    {
        return new AuthenticateResources($this);
    }

    public function getJsLogResources(): JsLogResources
    {
        return new JsLogResources($this);
    }
}
