<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Request\AccountLogin\AccountLogin;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\AccountLogin\AccountLogin as AccountLoginResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Devices\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\AccountLoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\GetDevicesRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\Icloud;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Icloud\Icloud as IcloudResponse;
class AuthenticateResources extends BaseResource
{
    /**
     * @param AccountLogin $data
     * @return AccountLoginResponse
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function accountLogin(AccountLogin $data): AccountLoginResponse
    {
        return $this->getConnector()->send(new AccountLoginRequest($data))->dto();
    }

    /**
     * @return Devices
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getDevices(): Devices
    {
        return $this->getConnector()->send(new GetDevicesRequest())->dto();
    }

    /**
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function icloud(): IcloudResponse
    {
        return $this->getConnector()->send(new Icloud())->dto();
    }
}
