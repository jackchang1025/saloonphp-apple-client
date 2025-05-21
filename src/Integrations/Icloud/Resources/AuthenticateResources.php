<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Request\AccountLogin\AccountLogin;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\AccountLogin\AccountLogin as AccountLoginResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Devices\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Icloud\Icloud as IcloudResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\AccountLoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\GetDevicesRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\Icloud;

class AuthenticateResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function accountLogin(AccountLogin $data): AccountLoginResponse
    {
        return $this->getConnector()->send(new AccountLoginRequest($data))->dto();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevices(): Devices
    {
        return $this->getConnector()->send(new GetDevicesRequest())->dto();
    }

    /**
     * @return Response
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function icloud(): IcloudResponse
    {
        return $this->getConnector()->send(new Icloud())->dto();
    }
}
