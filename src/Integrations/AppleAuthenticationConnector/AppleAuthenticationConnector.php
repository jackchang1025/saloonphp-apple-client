<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Request;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Resources\AuthenticationResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;

class AppleAuthenticationConnector extends AppleConnector
{
    public function __construct(protected string $url, protected AppleId $appleId)
    {
        parent::__construct($appleId);

        $this->withProxyEnabled(false);
        $this->withForceProxy(false);
    }

    public function isProxyEnabled(): bool
    {
        return false;
    }

    public function resolveBaseUrl(): string
    {
        return $this->url;
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        return true;
    }

    public function getAuthenticationResource(): AuthenticationResource
    {
        return new AuthenticationResource($this);
    }

    protected function defaultHeaders(): array
    {
        return [
        ];
    }
}
