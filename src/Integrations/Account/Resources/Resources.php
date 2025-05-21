<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\Request\Account;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\Request\SingIn;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Response\Response;

class Resources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function account(): Response
    {
        return $this->connector->send(new Account());
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function signIn(): Response
    {
        return $this->connector->send(new SingIn());
    }
}
