<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Request\AccountLogin\AccountLogin;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\AccountLogin\AccountLogin as AccountLoginResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Devices\Device;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\AccountLoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\GetDevicesRequest;

class PSetupIcloudResources extends BaseResource
{
    public function accountLogin(AccountLogin $data): AccountLoginResponse
    {
        return $this->getConnector()->send(new AccountLoginRequest($data))->dto();
    }

    public function getDevices(): Device
    {
        return $this->getConnector()->send(new GetDevicesRequest())->dto();
    }
}
