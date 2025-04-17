<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Icloud\Icloud as IcloudResponse;
use Saloon\Http\Response;

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