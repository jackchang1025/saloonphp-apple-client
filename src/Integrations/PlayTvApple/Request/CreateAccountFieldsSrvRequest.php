<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Data\CreateAccountFieldsSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class CreateAccountFieldsSrvRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $context = 'create',
        public bool $isVideoEverywhere = true,
        public string $restrictedAccountType = 'restrictedEmailOptimizedWeb',
    ) {}

    public function resolveEndpoint(): string
    {
        return "/WebObjects/MZPlay.woa/wa/createAccountFieldsSrv?context={$this->context}&isVideoEverywhere={$this->isVideoEverywhere}&restrictedAccountType={$this->restrictedAccountType}";
    }

    public function createDtoFromResponse(Response $response): CreateAccountFieldsSrvResponse
    {
        return CreateAccountFieldsSrvResponse::from($response->json());
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
