<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Request\VerifyCVV\VerifyCVV;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\VerifyCVV\VerifyCVV as VerifyCVVResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class VerifyCVVRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public readonly VerifyCVV $dto
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/setup/mac/family/verifyCVV';
    }

    public function defaultBody(): array
    {
        return $this->dto->toArray();
    }

    public function createDtoFromResponse(Response $response): VerifyCVVResponse
    {
        return VerifyCVVResponse::from($response->json());
    }
}
