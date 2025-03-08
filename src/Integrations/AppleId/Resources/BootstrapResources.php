<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Bootstrap;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class BootstrapResources extends BaseResource
{
    /**
     * @return Response
     * @throws FatalRequestException
     *
     * @throws RequestException
     */
    public function bootstrap(): Response
    {
        return $this->getConnector()->send(new Bootstrap());
    }
}
