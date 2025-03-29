<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Response\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\JsLog as JsLogRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\JsLog;
class JsLogResources extends BaseResource 
{

    /**
     * @param JsLog $data
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function jsLog(JsLog $data): Response
    {
        return $this->getConnector()
            ->send(new JsLogRequest($data));
    }
}
