<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Icloud\Icloud as IcloudResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class Icloud extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/';
    }

    public function createDtoFromResponse(Response $response): IcloudResponse
    {
        return new IcloudResponse($response->dom());
    }
}
