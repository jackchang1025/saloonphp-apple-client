<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Account;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\PaymentConfig;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class DataRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/account/manage/data';
    }

    public function createDtoFromResponse(Response $response): PaymentConfig
    {
        return PaymentConfig::from($response->json());
    }
}
