<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Request\AccountLogin\AccountLogin;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Response\AccountLogin\AccountLogin as AccountLoginResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Response\Devices\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Request\AccountLoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Request\GetDevicesRequest;

class AuthenticateResources extends BaseResource
{
    public function accountLogin(AccountLogin $data): AccountLoginResponse
    {
        return $this->getConnector()->send(new AccountLoginRequest($data))->dto();
    }

    public function getDevices(): Devices
    {
        return $this->getConnector()->send(new GetDevicesRequest())->dto();
    }
}
