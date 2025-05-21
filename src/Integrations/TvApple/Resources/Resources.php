<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\TvApple\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\TvApple\Request\TvAppleRequest;

class Resources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTvApple(): Response
    {
        return $this->getConnector()
            ->send(new TvAppleRequest())
        ;
    }
}
