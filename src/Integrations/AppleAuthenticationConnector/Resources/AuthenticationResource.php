<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Request\SignInComplete as SignInCompleteRequestData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response\SignInInit;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Request\SignInCompleteRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Request\SignInInitRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class AuthenticationResource extends BaseResource
{
    /**
     * @throws \JsonException|RequestException
     * @throws FatalRequestException
     */
    public function signInInit(string $account): SignInInit
    {
        return $this->getConnector()
            ->send(new SignInInitRequest($account))
            ->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function signInComplete(SignInCompleteRequestData $data): SignInComplete
    {
        return $this->getConnector()->send(
            new SignInCompleteRequest($data)
        )->dto();
    }
}
