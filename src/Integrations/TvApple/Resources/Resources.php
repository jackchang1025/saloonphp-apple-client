<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\TvApple\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\TvApple\Request\TvAppleRequest;
use Saloon\Http\Response;

class Resources extends BaseResource
{
    public function getTvApple(): Response
    {
        return $this->getConnector()
            ->send(new TvAppleRequest());
    }
}
