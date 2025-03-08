<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\Card\AddCardPayment;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\PaymentConfig;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\Card\AddCardRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\PaymentRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Http\Response;

class PaymentResources extends BaseResource
{
    public function addCardPayment(AddCardPayment $data): Response
    {
        return $this->connector->send(new AddCardRequest($data));
    }

    /**
     * @return PaymentConfig
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function payments(): PaymentConfig
    {
        return $this->connector->send(new PaymentRequest())->dto();
    }
}
