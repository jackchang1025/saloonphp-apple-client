<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\leaveFamily\leaveFamily;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class LeaveFamilyRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/setup/mac/family/leaveFamily';
    }

    public function createDtoFromResponse(Response $response): leaveFamily
    {
        return leaveFamily::from($response->json());
    }
}
