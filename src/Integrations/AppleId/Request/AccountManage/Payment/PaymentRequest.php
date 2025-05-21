<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\PaymentConfig;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class PaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/account/manage/payment';
    }

    public function createDtoFromResponse(Response $response): PaymentConfig
    {
        return PaymentConfig::from($response->json('paymentDetails'));
    }
}
