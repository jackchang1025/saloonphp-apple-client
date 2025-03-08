<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Payment\WechatPay;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\WechatPay\WechatPayUrl as WechatPayUrlResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class WechatPayUrl extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $countryCode = 'CHN',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/account/manage/payment/method/wechatpay/url?countryCode={$this->countryCode}";
    }

    public function createDtoFromResponse(Response $response): WechatPayUrlResponse
    {
        return WechatPayUrlResponse::from($response->json());
    }
}
