<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\CreateOptionsResponse;

class CreateOptionsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
}
    
    




