<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Weijiajia\SaloonphpAppleClient\Exception\StolenDeviceProtectionException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\AccountManager;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Token\Token;
use Modules\AppleClient\Service\Integrations\AppleId\Dto\Response\ValidatePassword\ValidatePassword;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class AccountManagerResource
{
    protected ?ValidatePassword $validatePassword = null;

    protected ?Token $token = null;

    public function __construct(protected AppleIdResource $appleIdResource)
    {

    }

    public function getAppleIdResource(): AppleIdResource
    {
        return $this->appleIdResource;
    }

    public function account(): AccountManager
    {
        return $this->getAppleIdResource()->getAppleIdConnector()->getAccountManagerResources()->account();
    }

    /**
     * @return ValidatePassword
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function authenticatePassword(): ValidatePassword
    {
        return $this->validatePassword ??= $this->getAppleIdResource()->getAppleIdConnector()->getAuthenticateResources(
        )->authenticatePassword(
            $this->getAppleIdResource()->getWebResource()->getApple()->getAccount()->password
        );
    }

    /**
     * @return Token
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function token(): Token
    {
        return $this->token ??= $this->getAppleIdResource()->getAppleIdConnector()->getAuthenticateResources()->token();
    }

    /**
     * @param string $countryCode
     * @param string $phoneNumber
     * @param string $countryDialCode
     * @return SecurityVerifyPhone|bool
     * @throws FatalRequestException
     */
    public function isStolenDeviceProtectionException(
        string $countryCode,
        string $phoneNumber,
        string $countryDialCode,
    ): SecurityVerifyPhone|bool {
        try {

            $this->token();
            $this->authenticatePassword();

            return $this->getAppleIdResource()->getSecurityPhoneResource()->securityVerifyPhone(
                countryCode: $countryCode,
                phoneNumber: $phoneNumber,
                countryDialCode: $countryDialCode
            );

        } catch (RequestException $e) {

            return $e instanceof StolenDeviceProtectionException;
        }
    }
}
