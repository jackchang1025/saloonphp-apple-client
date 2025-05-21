<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyInfo\FamilyInfo;

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
