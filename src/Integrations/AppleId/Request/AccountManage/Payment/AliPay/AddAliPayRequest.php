<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\AliPay;

use Modules\AppleClient\app\Service\Integrations\AppleId\Dto\Request\Payment\AliPay\AddAliPay;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

class AddAliPayRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        public AddAliPay $dto,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/account/manage/payment/method/alipay/{$this->dto->id}";
    }

    protected function defaultBody(): array
    {
        return $this->dto->toArray();
    }
}
