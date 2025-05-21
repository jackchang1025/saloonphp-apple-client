<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Repair as RepairData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Repair\Repair as RepairResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class Repair extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(public RepairData $data, public string $widgetKey, public string $sessionId) {}

    public function resolveEndpoint(): string
    {
        return 'account/manage/repair';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): RepairResponse
    {
        return RepairResponse::from($response->json());
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Widget-Key' => $this->widgetKey,
            'X-Apple-ID-Session-Id' => $this->sessionId,
        ];
    }
}
