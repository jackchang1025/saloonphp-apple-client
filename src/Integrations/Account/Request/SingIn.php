<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Request;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class SingIn extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/sign-in';
    }
}
