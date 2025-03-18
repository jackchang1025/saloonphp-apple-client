<?php
namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateAccountSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateAccountSrvData;
use Saloon\Http\Auth\TokenAuthenticator;

class CreateAccountSrvRequest extends Request implements HasBody
{
    use HasFormBody;
    
    protected Method $method = Method::POST;

    public function __construct(
        public string $token,
        public CreateAccountSrvData $data,
        public bool $isTVPlus = true,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/WebObjects/MZFinance.woa/wa/createAccountSrv?isTVPlus={$this->isTVPlus}";
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): CreateAccountSrvResponse
    {
        return CreateAccountSrvResponse::from($response->json());
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}