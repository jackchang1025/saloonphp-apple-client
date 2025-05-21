<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Payment\verify;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Plugins\HasContentTypeJson;

class Standard extends Request
{
    use HasContentTypeJson;

    protected Method $method = Method::GET;

    public function __construct(
        public string $location,
        public string $widgetKey,
        public string $sessionId,
    ) {}

    public function resolveEndpoint(): string
    {
        return $this->location;
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Widget-Key' => $this->widgetKey,
            'X-Apple-ID-Session-Id' => $this->sessionId,
        ];
    }
}
