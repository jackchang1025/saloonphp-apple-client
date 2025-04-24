<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\Icloud;

use Weijiajia\SaloonphpAppleClient\Resource\Idmsa\IdmsaResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\IdmsaConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\IcloudConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Devices\Devices;
use Weijiajia\SaloonphpAppleClient\Resource\AppleIdBatchRegistrationResource;

class IcloudResource extends IdmsaResource
{
    protected ?IcloudConnector $icloudConnector = null;

    public function idmsaConnector(): IdmsaConnector
    {
        return $this->idmsaConnector ?? new IdmsaConnector($this->apple());
    }

    public function icloudConnector(): IcloudConnector
    {
        return $this->icloudConnector ?? new IcloudConnector($this->apple());
    }

    public function getDevices(): Devices
    {
        return $this->icloudConnector()->getAuthenticateResources()->getDevices();
    }

    public function appleIdBatchRegistrationResource(): AppleIdBatchRegistrationResource
    {
        return new AppleIdBatchRegistrationResource($this->apple());
    }

}
