<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\PaymentConfig;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class PaymentResource
{
    public function __construct(protected AppleIdResource $appleIdResource)
    {

    }

    public function getAppleIdResource(): AppleIdResource
    {
        return $this->appleIdResource;
    }

    /**
     * @return PaymentConfig
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
