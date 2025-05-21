<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\JsLog;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\JsLog as JsLogRequest;
use Weijiajia\SaloonphpAppleClient\Response\Response;

class JsLogResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function jsLog(JsLog $data): Response
    {
        return $this->getConnector()
            ->send(new JsLogRequest($data))
        ;
    }
}
