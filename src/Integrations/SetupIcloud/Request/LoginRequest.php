<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\AccountLogin\Login;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\AccountLogin\Login as AccountLoginResponse;

class LoginRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(public Login $data) {}

    public function resolveEndpoint(): string
    {
        return '/setup/ws/1/accountLogin';
    }

    public function defaultQuery(): array
    {
        return [
            'clientBuildNumber' => $this->data->clientBuildNumber,
            'clientMasteringNumber' => $this->data->clientMasteringNumber,
            'clientId' => $this->data->clientId,
        ];
    }

    public function createDtoFromResponse(Response $response): AccountLoginResponse
    {
        return AccountLoginResponse::from($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'dsWebAuthToken' => $this->data->dsWebAuthToken,
            'accountCountryCode' => $this->data->accountCountryCode,
            'extended_login' => $this->data->extended_login,
        ];
    }
}
