<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;


class Account extends Request 
{

    protected Method $method = Method::GET;

    public function __construct(
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/account';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-excha',
        ];
    }
}