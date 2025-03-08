<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Devices;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\DeviceDetail;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class DeviceDetailRequest extends Request
{

    protected Method $method = Method::GET;

    /**
     * @param string $deviceId
     */
    public function __construct(public string $deviceId)
    {
    }

    public function createDtoFromResponse(Response $response): DeviceDetail
    {
        return DeviceDetail::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return "/account/manage/security/devices/{$this->deviceId}";
    }
}
