<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Weijiajia\SaloonphpAppleClient\DataConstruct\AddSecurityVerifyPhone\AddSecurityVerifyPhoneInterface;
use Weijiajia\SaloonphpAppleClient\Exception\BindPhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\ErrorException;
use Weijiajia\SaloonphpAppleClient\Exception\StolenDeviceProtectionException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class SecurityPhoneResource
{
    public function __construct(
        protected AppleIdResource $appleIdResource
    ) {
        
    }

    public function getAppleIdResource(): AppleIdResource
    {
        return $this->appleIdResource;
    }

    /**
     * @param string $countryCode
     * @param string $phoneNumber
     * @param string $countryDialCode
     * @param bool $nonFTEU
     * @return SecurityVerifyPhone
     * @throws BindPhoneException
     * @throws ErrorException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws StolenDeviceProtectionException
     * @throws VerificationCodeSentTooManyTimesException
     * @throws \Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException
     * @throws \Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneNumberAlreadyExistsException
     */
    public function securityVerifyPhone(
        string $countryCode,
        string $phoneNumber,
        string $countryDialCode,
        bool $nonFTEU = true
    ): SecurityVerifyPhone {
        return $this->getAppleIdResource()
            ->appleIdConnector()
            ->getSecurityPhoneResources()
            ->securityVerifyPhone(
                countryCode: $countryCode,
                phoneNumber: $phoneNumber,
                countryDialCode: $countryDialCode,
                nonFTEU: $nonFTEU
            );
    }

    /**
     * @param AddSecurityVerifyPhoneInterface $addSecurityVerifyPhone
     * @return SecurityVerifyPhone
     * @throws BindPhoneException
     * @throws ErrorException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws StolenDeviceProtectionException
     * @throws VerificationCodeException
     * @throws VerificationCodeSentTooManyTimesException
     * @throws \Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException
     * @throws \Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneNumberAlreadyExistsException
     */
    public function addSecurityVerifyPhone(AddSecurityVerifyPhoneInterface $addSecurityVerifyPhone): SecurityVerifyPhone
    {
        $response = $this->securityVerifyPhone(
            countryCode: $addSecurityVerifyPhone->getCountryCode(),
            phoneNumber: $addSecurityVerifyPhone->getPhoneNumber(),
            countryDialCode: $addSecurityVerifyPhone->getCountryDialCode(),
        );

        $code = $this->getAppleIdResource()->appleId()->securityCode();

        return $this->securityVerifyPhoneSecurityCode(
            id: $response->phoneNumberVerification->phoneNumber->id,
            phoneNumber: $addSecurityVerifyPhone->getPhoneNumber(),
            countryCode: $addSecurityVerifyPhone->getCountryCode(),
            countryDialCode: $addSecurityVerifyPhone->getCountryDialCode(),
            code: $code
        );
    }

    /**
     * @param int $id
     * @param string $phoneNumber
     * @param string $countryCode
     * @param string $countryDialCode
     * @param string $code
     * @return SecurityVerifyPhone
     * @throws VerificationCodeException
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     */
    public function securityVerifyPhoneSecurityCode(
        int $id,
        string $phoneNumber,
        string $countryCode,
        string $countryDialCode,
        string $code
    ): SecurityVerifyPhone {
        try {

            return $this->getAppleIdResource()
                ->appleIdConnector()
                ->getSecurityPhoneResources()
                ->securityVerifyPhoneSecurityCode(
                    id: $id,
                    phoneNumber: $phoneNumber,
                    countryCode: $countryCode,
                    countryDialCode: $countryDialCode,
                    code: $code
                );

        } catch (RequestException $e) {

            throw new VerificationCodeException($e->getResponse());
        }
    }
}
