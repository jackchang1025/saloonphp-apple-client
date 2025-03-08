<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\WechatPay;

use Modules\AppleClient\app\Service\Integrations\AppleId\Dto\Request\Payment\WechatPay\AddWechatPay;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

class AddWechatPayRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;


    public function __construct(
        public AddWechatPay $dto,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/account/manage/payment/method/wechatpay/{$this->dto->id}";
    }

    protected function defaultBody(): array
    {
        return $this->dto->toArray();
    }
}
