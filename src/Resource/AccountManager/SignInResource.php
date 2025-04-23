<?php

namespace App\Services\Resource\AccountManager;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Exception\SignInException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Request\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\SignIn\SignInComplete as IdmsaSignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\Auth as AppleAuth;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInComplete as SignInCompleteResponse;

class SignInResource
{
    protected ?AppleAuth $appleAuth = null;

    public function __construct(protected AccountManagerResource $accountManagerResource)
    {

    }

    public function accountManagerResource(): AccountManagerResource
    {
        return $this->accountManagerResource;
    }

    /**
     * @param string $appleId
     * @param string $password
     * @return SignInCompleteResponse
     * @throws FatalRequestException
     * @throws RequestException
     * @throws SignInException
     * @throws \JsonException|\Weijiajia\HttpProxyManager\Exception\ProxyModelNotFoundException
     */
        public function signIn(string $appleId,string $password): SignInCompleteResponse
        {
            $initData = $this->accountManagerResource()->apple()->appleAuthenticationConnector()
                ->getAuthenticationResource()
                ->signInInit($appleId);

            $signInInitData = $this->accountManagerResource()->apple()->idmsaConnector()
                ->getAuthenticateResources()
                ->signInInit(a: $initData->value, account: $appleId);

            $completeResponse = $this->accountManagerResource()->apple()->appleAuthenticationConnector()
                ->getAuthenticationResource()
                ->signInComplete(
                    SignInComplete::from(
                        [
                            'key'       => $initData->key,
                            'salt'      => $signInInitData->salt,
                            'b'         => $signInInitData->b,
                            'c'         => $signInInitData->c,
                            'password'  => $password,
                            'iteration' => $signInInitData->iteration,
                            'protocol'  => $signInInitData->protocol,
                        ]
                    )
                );

            return $this->accountManagerResource()->apple()->idmsaConnector()
                ->getAuthenticateResources()
                ->signInComplete(
                    IdmsaSignInComplete::from([
                        'account' => $appleId,
                        'm1'      => $completeResponse->M1,
                        'm2'      => $completeResponse->M2,
                        'c'       => $completeResponse->c,
                    ])
                );
        }

    /**
     * @return AppleAuth
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function appleAuth(): AppleAuth
    {
        return $this->appleAuth ??= $this->accountManagerResource()->apple()->idmsaConnector()->getAuthenticateResources()->auth();
    }
}
