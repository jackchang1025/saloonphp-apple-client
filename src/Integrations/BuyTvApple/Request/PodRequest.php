<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class PodRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/account/pod';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
