<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair;
use Weijiajia\SaloonphpAppleClient\Integrations\Request as BaseRequest;
use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Plugins\HasContentTypeJson;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Request;

class Options extends BaseRequest
{
    use HasContentTypeJson;


    protected Method $method = Method::GET;

    public function __construct(public string $widgetKey,public string $sessionId)
    {
    }

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