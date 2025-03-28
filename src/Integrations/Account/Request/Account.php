<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;


class Account extends Request 
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/account';
    }
}