<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy;

use Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request\PaymentInfosRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request\TokenRequest;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class Resources
{
    public function __construct(protected BuyConnector $connector)
    {
        $this->getToken();
    }

    public function getToken(): Response
    {
        return $this->getConnector()
            ->send(new TokenRequest());
    }

    public function getConnector(): BuyConnector
    {
        return $this->connector;
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
