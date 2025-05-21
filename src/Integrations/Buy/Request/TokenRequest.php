<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class TokenRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(public string $webAuthorizationFlowContext = 'apps') {}

    public function defaultHeaders(): array
    {
        return [
            'Host' => 'auth.apps.apple.com',
            'Referer' => 'auth.apps.apple.com',
            'Origin' => 'auth.apps.apple.com',
            'authorization' => 'Bearer eyJhbGciOiJFUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IjU1VDNUMjM4UTQifQ.eyJpc3MiOiJBTVBXZWJQbGF5IiwiaWF0IjoxNzMwNDE5NDExLCJleHAiOjE3NDU5NzE0MTEsInJvb3RfaHR0cHNfb3JpZ2luIjpbImFwcGxlLmNvbSIsIm16c3RhdGljLmNvbSJdfQ.O1wyYiEV1MccDniy5UizG3N5AJPI6uTF8AJPj4EV9G09LyuAKEDBF1M99-8_Sz5w98rYHHHFB8qqWc7n0IECUg',
        ];
    }

    public function resolveEndpoint(): string
    {
        return 'https://auth.apps.apple.com/auth/v1/gs';
    }

    public function defaultBody(): array
    {
        return [
            'webAuthorizationFlowContext' => $this->webAuthorizationFlowContext,
        ];
    }
}
