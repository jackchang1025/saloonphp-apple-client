<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Bootstrap;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class BootstrapResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function bootstrap(): Response
    {
        return $this->getConnector()->send(new Bootstrap());
    }
}
