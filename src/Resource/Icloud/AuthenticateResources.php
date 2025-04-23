<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\Icloud;

use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Request\AccountLogin\AccountLogin;

class AuthenticateResources
{

    public function __construct(protected IcloudResource $resources)
    {
    }

    public function getResources(): IcloudResource
    {
        return $this->resources;
    }

    public function accountLogin(AccountLogin $data
    ): \Modules\AppleClient\Service\Integrations\WebIcloud\Dto\Response\AccountLogin\AccountLogin {
        return $this->getResources()->getWebIcloudConnector()->getAuthenticateResources()->accountLogin($data);
    }

    /**
     * @return \Modules\AppleClient\Service\Integrations\WebIcloud\Dto\Response\AccountLogin\AccountLogin
     * @throws \JsonException
     * @throws \Modules\AppleClient\Service\Exception\MaxRetryAttemptsException
     * @throws \Modules\AppleClient\Service\Exception\PhoneAddressException
     * @throws \Modules\AppleClient\Service\Exception\PhoneNotFoundException
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     * @throws \Throwable
     */
    public function autoAuth(
    ): \Modules\AppleClient\Service\Integrations\WebIcloud\Dto\Response\AccountLogin\AccountLogin
    {

        $this->getResources()->signIn();

        $apple = $this->getResources()->getWebResource()->getApple();

        $headerRepositories = $this->getResources()->getHeaderSynchronize()->getHeaderRepositories()->all();

        if (empty($headerRepositories['X-Apple-Session-Token'])) {
            throw new \RuntimeException('No X-Apple-Session-Token cookie found');
        }

        $data = new AccountLogin(
            dsWebAuthToken: $headerRepositories['X-Apple-Session-Token'],
            accountCountryCode: $apple->getAccount()->getAccountCountryCode(),
            extended_login: false
        );

        $AccountInfo = $this->accountLogin($data);

//        $this->getResources()->twoFactorAuthentication();

        $headerRepositories = $this->getResources()->getHeaderSynchronize()->getHeaderRepositories()->all();

        if (empty($headerRepositories['X-Apple-Session-Token'])) {
            throw new \RuntimeException('No X-Apple-Session-Token cookie found');
        }

        $data = new AccountLogin(
            dsWebAuthToken: $headerRepositories['X-Apple-Session-Token'],
            accountCountryCode: $apple->getAccount()->getAccountCountryCode(),
            extended_login: false,
            dsid: $AccountInfo->dsInfo->dsid
        );

        return $this->accountLogin($data);
    }
}
