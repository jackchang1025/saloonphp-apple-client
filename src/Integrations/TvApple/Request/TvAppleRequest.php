<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\TvApple\Request;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class TvAppleRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/';
    }
}
