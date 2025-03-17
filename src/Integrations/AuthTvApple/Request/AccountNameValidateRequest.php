<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\AccountNameValidateResponse;
class AccountNameValidateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $accountName,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/web/accountName/validate';
    }

    public function defaultBody(): array
    {
        return [
            'accountName' => $this->accountName,
        ];
    }

    public function createDtoFromResponse(Response $response): AccountNameValidateResponse
    {
        return AccountNameValidateResponse::from($response->json());
    }
}