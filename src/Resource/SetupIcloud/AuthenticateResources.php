<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\SetupIcloud;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\AccountLogin\Login;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\AccountLogin\Login as AccountLoginResponse;

class AuthenticateResources extends SetupIcloudResource
{
    public function accountLogin(
        Login $data
    ): AccountLoginResponse {
        return $this->setupIcloudConnector()->getAuthenticateResources()->login($data);
    }

    /**
     * @throws \JsonException
     * @throws MaxRetryAttemptsException
     * @throws PhoneAddressException
     * @throws PhoneNotFoundException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws \Throwable
     */
    public function autoAuth(
    ): AccountLoginResponse {
        $this->appleId()->appleIdResource()->signIn();

        $headerRepositories = $this->appleId()->headerSynchronizeDriver()?->all();

        if (empty($headerRepositories['X-Apple-Session-Token'])) {
            throw new \RuntimeException('No X-Apple-Session-Token cookie found');
        }

        $data = new Login(
            dsWebAuthToken: $headerRepositories['X-Apple-Session-Token'],
            accountCountryCode: $this->appleId()->country()?->getAlpha2Code(),
            extended_login: false
        );

        $accountInfo = $this->accountLogin($data);

        //        $this->getResources()->twoFactorAuthentication();

        $headerRepositories = $this->appleId()->headerSynchronizeDriver()?->all();

        if (empty($headerRepositories['X-Apple-Session-Token'])) {
            throw new \RuntimeException('No X-Apple-Session-Token cookie found');
        }

        $data = new Login(
            dsWebAuthToken: $headerRepositories['X-Apple-Session-Token'],
            accountCountryCode: $this->appleId()->country()?->getAlpha2Code(),
            extended_login: false,
            dsid: $accountInfo->dsInfo->dsid
        );

        return $this->accountLogin($data);
    }
}
