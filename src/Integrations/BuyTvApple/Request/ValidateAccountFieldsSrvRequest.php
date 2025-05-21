<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateAccountFieldsSrvData;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateAccountFieldsSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class ValidateAccountFieldsSrvRequest extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function __construct(
        public ValidateAccountFieldsSrvData $data,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/WebObjects/MZFinance.woa/wa/validateAccountFieldsSrv';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): ValidateAccountFieldsSrvResponse
    {
        return ValidateAccountFieldsSrvResponse::from($response->json());
    }
}
