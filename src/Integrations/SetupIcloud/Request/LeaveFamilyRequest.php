<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\leaveFamily\leaveFamily;

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
