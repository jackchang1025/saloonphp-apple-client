<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair\Verify;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Verify\Phone as PhoneData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Repair\Repair;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;


class Phone extends Request implements HasBody
{
    use HasJsonBody;

    

    protected Method $method = Method::POST;

    public function __construct(public PhoneData $data,public string $widgetKey,public string $sessionId)
    {
    }

  

    public function resolveEndpoint(): string
    {
        return '/account/manage/repair/verify/phone';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): Repair
    {
        return Repair::from($response->json());
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Widget-Key' => $this->widgetKey,
            'X-Apple-ID-Session-Id' => $this->sessionId,
        ];
    }
}