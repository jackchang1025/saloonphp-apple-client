<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\Device;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\DeviceDetail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\Devices;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Spatie\LaravelData\DataCollection;

class DevicesResource
{

    public function __construct(protected AppleIdResource $appleIdResource)
    {

    }

    public function getAppleIdResource(): AppleIdResource
    {
        return $this->appleIdResource;
    }

    /**
     * @return Devices
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevices(): Devices
    {
        return $this->getAppleIdResource()->getAppleIdConnector()->getSecurityDevicesResources()->devices();
    }

    /**
     * @return DataCollection
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevicesDetails(): DataCollection
    {
        return $this->getDevices()->devices
            ->map(function (Device $device) {

                if ($device->deviceDetail) {
                    return $device;
                }

                $device->deviceDetail = $this->getDevicesDetail($device->deviceId);

                return $device;
            });
    }

    /**
     * @param string $paymentId
     * @return DeviceDetail
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevicesDetail(string $paymentId): DeviceDetail
    {
        return $this->getAppleIdResource()->getAppleIdConnector()->getSecurityDevicesResources()->deviceDetail(
            $paymentId
        );
    }
}
