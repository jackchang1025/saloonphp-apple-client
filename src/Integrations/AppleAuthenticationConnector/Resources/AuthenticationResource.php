<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Request\SignInComplete as SignInCompleteRequestData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response\SignInInit;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Request\SignInCompleteRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Request\SignInInitRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class AuthenticationResource extends BaseResource
{
    /**
     * @param string $account
     *
     * @return SignInInit
     * @throws \Saloon\Exceptions\Request\RequestException|\JsonException
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     */
    public function signInInit(string $account): SignInInit
    {
        return $this->getConnector()
            ->send(new SignInInitRequest($account))
            ->dto();
    }

    /**
     * @param SignInCompleteRequestData $data
     * @return SignInComplete
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
