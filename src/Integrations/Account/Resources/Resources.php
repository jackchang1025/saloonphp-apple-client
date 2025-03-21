<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\Account\Request\Account;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\Request\SingIn;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Response\Response;

class Resources extends BaseResource
{

    /**
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function account():Response
    {
        return $this->connector->send(new Account());
    }

    /**
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function signIn():Response
    {
        return $this->connector->send(new SingIn());
    }
}