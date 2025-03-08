<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Contracts\Body\HasBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate;
class Account extends Request implements HasBody
{

    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public Validate $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/account';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }
}