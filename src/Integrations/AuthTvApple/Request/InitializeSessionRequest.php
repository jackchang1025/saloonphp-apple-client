<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\InitializeSessionResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

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

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
