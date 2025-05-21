<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\AccountNameValidateResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\InitializeSessionResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\AccountNameValidateRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\InitializeSessionRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class Resources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getInitializeSession(): InitializeSessionResponse
    {
        return $this->getConnector()
            ->send(new InitializeSessionRequest())->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccountNameValidate(string $accountName, string $pageUUID): AccountNameValidateResponse
    {
        return $this->getConnector()
            ->send(new AccountNameValidateRequest($accountName, $pageUUID))->dto()
        ;
    }
}
