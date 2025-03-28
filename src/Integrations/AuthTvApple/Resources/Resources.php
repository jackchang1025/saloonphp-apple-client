<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\InitializeSessionRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\AccountNameValidateRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\AccountNameValidateResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\InitializeSessionResponse; 

class Resources extends BaseResource
{
    /**
     * @return InitializeSessionResponse
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getInitializeSession(): InitializeSessionResponse
    {
        return $this->getConnector()
            ->send(new InitializeSessionRequest())->dto();
    }

    /**
     * @param string $accountName
     * @param string $pageUUID
     * @return AccountNameValidateResponse
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getAccountNameValidate(string $accountName,string $pageUUID): AccountNameValidateResponse
    {
        return $this->getConnector()
            ->send(new AccountNameValidateRequest($accountName,$pageUUID))->dto();

    }

  
}

