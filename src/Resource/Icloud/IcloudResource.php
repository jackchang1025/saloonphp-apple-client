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
        return $this->idmsaConnector ?? new IdmsaConnector($this->appleId(),'d39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d','https://www.icloud.com');
    }

    public function icloudConnector(): IcloudConnector
    {
        return $this->icloudConnector ?? new IcloudConnector($this->appleId());
    }

    public function getDevices(): Devices
    {
        return $this->icloudConnector()->getAuthenticateResources()->getDevices();
    }

    public function appleIdBatchRegistrationResource(): AppleIdBatchRegistrationResource
    {
        return new AppleIdBatchRegistrationResource($this->appleId());
    }

}
