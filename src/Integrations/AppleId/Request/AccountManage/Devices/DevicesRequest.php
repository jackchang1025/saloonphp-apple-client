<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Devices;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class DevicesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/account/manage/security/devices';
    }

    public function createDtoFromResponse(Response $response): Devices
    {
        return Devices::from($response->json());
    }
}
