<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Request\Api;

use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Login;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class LoginRequest extends Request
{
    protected Method $method = Method::GET;

    public function createDtoFromResponse(Response $response): Login
    {
        return Login::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return '/api/login';
    }
}
