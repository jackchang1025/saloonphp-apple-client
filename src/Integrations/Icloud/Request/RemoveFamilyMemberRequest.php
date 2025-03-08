<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\FamilyInfo\FamilyInfo;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class RemoveFamilyMemberRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public readonly string|int $dsid
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/setup/mac/family/removeFamilyMember';
    }

    public function createDtoFromResponse(Response $response): FamilyInfo
    {
        return FamilyInfo::from($response->json());
    }

    public function defaultBody(): array
    {
        return [
            "dsid" => $this->dsid,
        ];
    }

}
