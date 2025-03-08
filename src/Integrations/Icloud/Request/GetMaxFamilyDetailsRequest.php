<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\FamilyInfo\FamilyInfo;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class GetMaxFamilyDetailsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/setup/mac/family/getFamilyDetails';
    }

    public function createDtoFromResponse(Response $response): FamilyInfo
    {
        return FamilyInfo::from($response->json());
    }
}
