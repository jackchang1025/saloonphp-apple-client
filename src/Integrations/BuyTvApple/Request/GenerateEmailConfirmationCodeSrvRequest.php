<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\GenerateEmailConfirmationCodeSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class GenerateEmailConfirmationCodeSrvRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $email,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/WebObjects/MZFinance.woa/wa/generateEmailConfirmationCodeSrv';
    }

    public function defaultBody(): array
    {
        return [
            'email' => $this->email,
        ];
    }

    public function createDtoFromResponse(Response $response): GenerateEmailConfirmationCodeSrvResponse
    {
        return GenerateEmailConfirmationCodeSrvResponse::from($response->json());
    }
}
