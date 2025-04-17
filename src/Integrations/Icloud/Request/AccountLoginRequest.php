<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\AccountLogin\AccountLogin as AccountLoginResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Request\AccountLogin\AccountLogin;

class AccountLoginRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(public readonly AccountLogin $data)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/setup/ws/1/accountLogin";
    }

    public function defaultQuery(): array
    {
        return [
            'clientBuildNumber'     => $this->data->clientBuildNumber,
            'clientMasteringNumber' => $this->data->clientMasteringNumber,
            'clientId'              => $this->data->clientId,
        ];
    }

    protected function defaultBody(): array
    {
        return [
            'dsWebAuthToken'     => $this->data->dsWebAuthToken,
            'accountCountryCode' => $this->data->accountCountryCode,
            'extended_login'     => $this->data->extended_login,
        ];
    }

    public function createDtoFromResponse(Response $response): AccountLoginResponse
    {
        return AccountLoginResponse::from($response->json());
    }
}
