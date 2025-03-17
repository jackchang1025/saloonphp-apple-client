<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class InitializeSessionRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/liteReplayProtection/initializeSession';
    }
    
}