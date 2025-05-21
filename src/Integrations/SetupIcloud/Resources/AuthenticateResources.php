<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Exception\LoginRequestException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\AccountLogin\Login;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\AccountLogin\Login as LoginResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Authenticate\Authenticate;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Devices\Device;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\LoginDelegates;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\AuthenticateRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\GetDevicesRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\LoginDelegatesRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\LoginRequest;

class AuthenticateResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function authenticate(string $appleId, string $password, ?string $authCode = null): Authenticate
    {
        return $this->getConnector()
            ->send(new AuthenticateRequest($appleId, $password, $authCode))
            ->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws LoginRequestException|RequestException|VerificationCodeException
     */
    public function loginDelegatesRequest(
        string $appleId,
        string $password,
        string $authCode = '',
        string $clientId = '67BDADCA-6E66-7ED7-A01A-5EB3C5D95CE3',
        string $protocolVersion = '4'
    ): LoginDelegates {
        return $this->getConnector()
            ->send(new LoginDelegatesRequest($appleId, $password, $authCode, $clientId, $protocolVersion))
            ->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function login(Login $data): LoginResponse
    {
        return $this->getConnector()->send(new LoginRequest($data))->dto();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevices(): Device
    {
        return $this->getConnector()->send(new GetDevicesRequest())->dto();
    }
}
