<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Buy\DTO\AddPaymentInfos;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

class AddPaymentInfosRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;


    public function __construct(
        public AddPaymentInfos $addPaymentInfosDto
    ) {
    }


    public function resolveEndpoint(): string
    {
        return '/account/v1/stackable/paymentInfos/add';
    }

    public function defaultBody(): array
    {
        return $this->addPaymentInfosDto->toArray();
    }
}
