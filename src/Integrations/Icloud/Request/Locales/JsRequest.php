<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\Locales;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class JsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $path,
        public string $referer,
    ) {}

    public function resolveEndpoint(): string
    {
        return $this->path;
    }

    public function defaultHeaders(): array
    {
        return [
            'referer' => $this->referer,
        ];
    }
}
