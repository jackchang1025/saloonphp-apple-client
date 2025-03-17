<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\InitializeSessionResponse;
use Saloon\Http\Response;

class InitializeSessionRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/liteReplayProtection/initializeSession';
    }

    public function createDtoFromResponse(Response $response): InitializeSessionResponse
    {
        return InitializeSessionResponse::from($response->json());
    }
}