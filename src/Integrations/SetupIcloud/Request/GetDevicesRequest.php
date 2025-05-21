<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Devices\Devices;

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
