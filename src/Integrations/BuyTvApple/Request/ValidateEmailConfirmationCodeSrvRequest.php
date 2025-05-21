<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateEmailConfirmationCodeSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class ValidateEmailConfirmationCodeSrvRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $email,
        public string $clientToken,
        public string $secretCode,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/WebObjects/MZFinance.woa/wa/validateEmailConfirmationCodeSrv';
    }

    public function defaultBody(): array
    {
        return [
            'email' => $this->email,
            'clientToken' => $this->clientToken,
            'secretCode' => $this->secretCode,
        ];
    }

    public function createDtoFromResponse(Response $response): ValidateEmailConfirmationCodeSrvResponse
    {
        return ValidateEmailConfirmationCodeSrvResponse::from($response->json());
    }
}
