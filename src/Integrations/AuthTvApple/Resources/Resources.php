<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\InitializeSessionRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\AccountNameValidateRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\AccountNameValidateResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\InitializeSessionResponse; 
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Request\CreateOptionsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data\CreateOptionsResponse;

class Resources extends BaseResource
{
    public function getInitializeSession(): InitializeSessionResponse
    {
        $request = new InitializeSessionRequest();
        $response = $this->getConnector()
            ->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function getAccountNameValidate(string $accountName): AccountNameValidateResponse
    {
        $request = new AccountNameValidateRequest($accountName);
        $response = $this->getConnector()
            ->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function createOptions(string $restrictedAccountType = 'restrictedEmailOptimizedWeb'): CreateOptionsResponse
    {
        $request = new CreateOptionsRequest($restrictedAccountType);
        $response = $this->getConnector()
            ->send($request);

       return $request->createDtoFromResponse($response);
    }
}

