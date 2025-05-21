<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request\PaymentInfosRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request\TokenRequest;

class Resources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function __construct(BuyConnector $connector)
    {
        parent::__construct($connector);
        $this->getToken();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getToken(): Response
    {
        return $this->getConnector()
            ->send(new TokenRequest())
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function paymentInfosRequest(): Response
    {
        return $this->getConnector()
            ->send(new PaymentInfosRequest())
        ;
    }
}
