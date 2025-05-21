<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\PaymentConfig;

class PaymentResource
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
    public function getPayment(): PaymentConfig
    {
        return $this->getAppleIdResource()->appleIdConnector()->getPaymentResources()->payments();
    }

    public function getPaymentInfos()
    {
        return $this->getAppleIdResource()->buyConnector()->getResources()->paymentInfosRequest();
    }
}
