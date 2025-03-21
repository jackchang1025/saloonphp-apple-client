<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class SingIn extends Request 
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/sign-in';
    }
}