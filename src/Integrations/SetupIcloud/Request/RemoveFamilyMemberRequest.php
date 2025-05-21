<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyInfo\FamilyInfo;

class RemoveFamilyMemberRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public readonly int|string $dsid
    ) {}

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
            'dsid' => $this->dsid,
        ];
    }
}
