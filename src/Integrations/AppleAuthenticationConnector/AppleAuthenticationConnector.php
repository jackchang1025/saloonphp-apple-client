<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Resources\AuthenticationResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Request;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
class AppleAuthenticationConnector extends AppleConnector
{
    public function isProxyEnabled(): bool
    {
        return false;
    }

    /**
     * @param string $url
     */
    public function __construct(readonly protected string $url, AppleId $appleId)
    {
        parent::__construct($appleId);
        
        $this->withProxyEnabled(false);
        $this->withForceProxy(false);
    }

    public function resolveBaseUrl(): string
    {
        return $this->url;
    }

    protected function defaultHeaders(): array
    {
        return [
        ];
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        return true;
    }

    public function getAuthenticationResource(): AuthenticationResource
    {
        return new AuthenticationResource($this);
    }
}
