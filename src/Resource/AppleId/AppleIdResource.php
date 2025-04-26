<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\BuyConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\IdmsaConnector;
use Weijiajia\SaloonphpAppleClient\Resource\Idmsa\IdmsaResource;

class AppleIdResource extends IdmsaResource
{
    protected ?BuyConnector $buyConnector = null;
    protected ?AppleIdConnector $appleIdConnector = null;
    protected ?DevicesResource $devicesResource = null;
    protected ?PaymentResource $paymentResource = null;
    protected ?SecurityPhoneResource $securityPhoneResource = null;
    protected ?AccountManagerResource $accountManagerResource = null;
    protected ?ReportProblemResource $reportProblemResource = null;

    public function getAccountManagerResource(): AccountManagerResource
    {
        return $this->accountManagerResource ??= new AccountManagerResource($this);
    }

    public function idmsaConnector(): IdmsaConnector
    {        
        return $this->idmsaConnector ?? new IdmsaConnector($this->appleId(),'af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3','https://account.apple.com');
    }

    public function appleIdConnector(): AppleIdConnector
    {
        return $this->appleIdConnector ?? new AppleIdConnector($this->appleId());
    }

    public function buyConnector(): BuyConnector
    {
        return $this->buyConnector ??= new BuyConnector(
            $this->appleId()
        );
    }

    public function getSecurityPhoneResource(): SecurityPhoneResource
    {
        return $this->securityPhoneResource ??= new SecurityPhoneResource($this);
    }

    public function getDevicesResource(): DevicesResource
    {
        return $this->devicesResource ??= new DevicesResource($this);
    }

    public function getPaymentResource(): PaymentResource
    {
        return $this->paymentResource ??= new PaymentResource($this);
    }

    public function getReportProblemResource(): ReportProblemResource
    {
        return $this->reportProblemResource ??= new ReportProblemResource($this);
    }
}



