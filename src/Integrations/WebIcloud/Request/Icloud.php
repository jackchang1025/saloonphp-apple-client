<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class Icloud extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/';
    }
}