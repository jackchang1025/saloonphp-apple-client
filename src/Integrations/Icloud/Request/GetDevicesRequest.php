<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Devices\Devices;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

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
