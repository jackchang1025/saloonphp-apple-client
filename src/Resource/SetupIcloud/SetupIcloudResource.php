<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\SetupIcloud;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Auth\BasicAuthenticator;
use Weijiajia\SaloonphpAppleClient\Events\Authenticated\AuthenticatedEvent;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Authenticate\Authenticate;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\SetupIcloudConnector;
use Weijiajia\SaloonphpAppleClient\Resource\Resource;

class SetupIcloudResource extends Resource
{
    protected ?SetupIcloudConnector $setupIcloudConnector = null;
    protected ?Authenticate $authenticate = null;

    public function setupIcloudConnector(): SetupIcloudConnector
    {
        return $this->setupIcloudConnector ??= new SetupIcloudConnector($this->appleId());
    }

    public function getAuthenticate(): ?Authenticate
    {
        return $this->authenticate;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function login(): Authenticate
    {
        return $this->setupIcloudConnector()
            ->getAuthenticateResources()
            ->authenticate(
                appleId: $this->appleId()->appleId(),
                password: $this->appleId()->password(),
            )
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function auth(string $code): Authenticate
    {
        $this->authenticate = $this->setupIcloudConnector()
            ->getAuthenticateResources()
            ->authenticate(
                appleId: $this->appleId()->appleId(),
                password: $this->appleId()->password(),
                authCode: $code,
            )
        ;

        $this->setupIcloudConnector()->authenticate(
            new BasicAuthenticator($this->authenticate->appleAccountInfo->dsid, $this->authenticate->tokens->mmeAuthToken)
        );

        $this->appleId()->dispatcher()?->dispatch(
            new AuthenticatedEvent($this->appleId())
        );

        return $this->authenticate;
    }
}
