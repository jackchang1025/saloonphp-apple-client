<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\InitializeSessionRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\AccountNameValidateRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\AccountNameValidateResponse;
use Saloon\Http\Response;

class Resources extends BaseResource
{
    public function getInitializeSession(): Response
    {
        return $this->getConnector()
            ->send(new InitializeSessionRequest());
    }

    public function getAccountNameValidate(string $accountName): AccountNameValidateResponse
    {
        return $this->getConnector()
            ->send(new AccountNameValidateRequest($accountName))->dto();
    }
}

