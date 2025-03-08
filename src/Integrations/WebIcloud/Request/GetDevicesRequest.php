<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Response\Devices\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class GetDevicesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/setup/web/device/getDevices';
    }

    public function createDtoFromResponse(Response $response): Devices
    {
        return Devices::from($response->json());
    }
}
