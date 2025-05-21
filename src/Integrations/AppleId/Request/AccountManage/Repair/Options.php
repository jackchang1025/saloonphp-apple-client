<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request as BaseRequest;
use Weijiajia\SaloonphpAppleClient\Plugins\HasContentTypeJson;

class Options extends BaseRequest
{
    use HasContentTypeJson;

    protected Method $method = Method::GET;

    public function __construct(public string $widgetKey, public string $sessionId) {}

    public function resolveEndpoint(): string
    {
        return '/account/manage/repair/options';
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Widget-Key' => $this->widgetKey,
            'X-Apple-ID-Session-Id' => $this->sessionId,
        ];
    }
}
