<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\Device;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\DeviceDetail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\Devices;

class DevicesResource
{
    public function __construct(protected AppleIdResource $appleIdResource) {}

    public function getAppleIdResource(): AppleIdResource
    {
        return $this->appleIdResource;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevices(): Devices
    {
        return $this->getAppleIdResource()->appleIdConnector()->getSecurityDevicesResources()->devices();
    }

    /**
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
            })
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getDevicesDetail(string $paymentId): DeviceDetail
    {
        return $this->getAppleIdResource()->appleIdConnector()->getSecurityDevicesResources()->deviceDetail(
            $paymentId
        );
    }
}
