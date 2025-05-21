<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateOptionsResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class CreateOptionsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $restrictedAccountType = 'restrictedEmailOptimizedWeb',
    ) {}

    public function resolveEndpoint(): string
    {
        return "/account/restricted/create/options?restrictedAccountType={$this->restrictedAccountType}";
    }

    public function createDtoFromResponse(Response $response): CreateOptionsResponse
    {
        return CreateOptionsResponse::from($response->json());
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
