<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\DeviceDetail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Devices\DeviceDetailRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Devices\DevicesRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class SecurityDevicesResources extends BaseResource
{
    /**
     * @param string $deviceId
     * @return DeviceDetail
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deviceDetail(string $deviceId): DeviceDetail
    {
        return $this->getConnector()
            ->send(new DeviceDetailRequest($deviceId))
            ->dto();
    }

    /**
     * @return Devices
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function devices(): Devices
    {
        return $this->getConnector()
            ->send(new DevicesRequest())
            ->dto();
    }
}
