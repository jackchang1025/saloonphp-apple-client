<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\Card\AddCardPayment;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\PaymentConfig;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\Card\AddCardRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\PaymentRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class PaymentResources extends BaseResource
{
    public function addCardPayment(AddCardPayment $data): Response
    {
        return $this->connector->send(new AddCardRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function payments(): PaymentConfig
    {
        return $this->connector->send(new PaymentRequest())->dto();
    }
}
