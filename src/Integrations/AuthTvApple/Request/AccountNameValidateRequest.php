<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\AccountNameValidateResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class AccountNameValidateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $accountName,
        public string $pageUUID,
    ) {}

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

    protected function defaultHeaders(): array
    {
        return [
            'X-Apple-Page-UUID' => $this->pageUUID,
        ];
    }
}
