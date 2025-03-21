<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request\PaymentInfosRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request\TokenRequest;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class Resources extends BaseResource
{
    /**
     * @param BuyConnector $connector
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function __construct(BuyConnector $connector){
        parent::__construct($connector);
        $this->getToken();
    }

    /**
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getToken(): Response
    {
        return $this->getConnector()
            ->send(new TokenRequest());
    }

    /**
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function paymentInfosRequest(): Response
    {
        return $this->getConnector()
            ->send(new PaymentInfosRequest());
    }
}
