<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Request\System;


use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class MainJs extends Request
{

    protected Method $method = Method::GET;

    public function __construct(public string $version)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/system/icloud.com/{$this->version}/en-ca/main.js";
    }

    protected function defaultHeaders(): array
    {
        return [
            'sec-fetch-dest' => 'script',
        ];
    }
}