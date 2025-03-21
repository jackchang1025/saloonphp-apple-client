<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources;

use Weijiajia\SaloonphpAppleClient\Exception\LoginRequestException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Authenticate\Authenticate;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\LoginDelegates;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\AuthenticateRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\LoginDelegatesRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class AuthenticateResources extends BaseResource
{
    /**
     * @param string $appleId
     * @param string $password
     * @param string|null $authCode
     * @return Authenticate
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function authenticate(string $appleId, string $password, ?string $authCode = null): Authenticate
    {
        return $this->getConnector()
            ->send(new AuthenticateRequest($appleId, $password, $authCode))
            ->dto();
    }

    /**
     * @param string $appleId
     * @param string $password
     * @param string $authCode
     * @param string $clientId
     * @param string $protocolVersion
     * @return LoginDelegates
     * @throws FatalRequestException
     * @throws RequestException|LoginRequestException|VerificationCodeException
     */
    public function loginDelegatesRequest(
        string $appleId,
        string $password,
        string $authCode = '',
        string $clientId = '67BDADCA-6E66-7ED7-A01A-5EB3C5D95CE3',
        string $protocolVersion = '4'
    ): LoginDelegates
    {
        return $this->getConnector()
            ->send(new LoginDelegatesRequest($appleId, $password, $authCode, $clientId, $protocolVersion))
            ->dto();
    }
}
