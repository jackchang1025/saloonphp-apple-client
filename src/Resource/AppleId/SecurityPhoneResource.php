<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\DataConstruct\AddSecurityVerifyPhone\AddSecurityVerifyPhoneInterface;
use Weijiajia\SaloonphpAppleClient\Events\SecurityPhone\SendPhoneSecurityCodeFailedEvent;
use Weijiajia\SaloonphpAppleClient\Events\SecurityPhone\SendPhoneSecurityCodeSuccessEvent;
use Weijiajia\SaloonphpAppleClient\Events\SecurityPhone\VerifySecurityCodeFailedEvent;
use Weijiajia\SaloonphpAppleClient\Events\SecurityPhone\VerifySecurityCodeSuccessEvent;
use Weijiajia\SaloonphpAppleClient\Exception\DescriptionNotAvailableException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneNumberAlreadyExistsException;
use Weijiajia\SaloonphpAppleClient\Exception\StolenDeviceProtectionException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\DeleteSecurityVerify;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;

class SecurityPhoneResource
{
    public function __construct(
        protected AppleIdResource $appleIdResource
    ) {}

    public function getAppleIdResource(): AppleIdResource
    {
        return $this->appleIdResource;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws StolenDeviceProtectionException
     * @throws VerificationCodeSentTooManyTimesException
     * @throws DescriptionNotAvailableException
     * @throws PhoneException
     * @throws PhoneNumberAlreadyExistsException
     */
    public function securityVerifyPhone(
        string $countryCode,
        string $phoneNumber,
        string $countryDialCode,
        bool $nonFTEU = true
    ): SecurityVerifyPhone {
        try {
            return $this->executeSecurityVerifyPhoneCall($countryCode, $phoneNumber, $countryDialCode, $nonFTEU);
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (451 == $response->status()) {
                $this->getAppleIdResource()->getAccountManagerResource()->authenticatePassword();

                return $this->executeSecurityVerifyPhoneCall($countryCode, $phoneNumber, $countryDialCode, $nonFTEU);
            }

            $this->getAppleIdResource()
                ->appleId()
                ->dispatcher()
                ?->dispatch(new SendPhoneSecurityCodeFailedEvent($this->getAppleIdResource()->appleId(), $e))
            ;

            throw $e;
        }
    }

    /**
     * @throws DescriptionNotAvailableException
     * @throws FatalRequestException
     * @throws PhoneException
     * @throws PhoneNumberAlreadyExistsException
     * @throws RequestException
     * @throws StolenDeviceProtectionException
     * @throws VerificationCodeException
     * @throws VerificationCodeSentTooManyTimesException
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
     * @throws VerificationCodeException
     * @throws FatalRequestException
     */
    public function securityVerifyPhoneSecurityCode(
        int $id,
        string $phoneNumber,
        string $countryCode,
        string $countryDialCode,
        string $code
    ): SecurityVerifyPhone {
        try {
            $response = $this->getAppleIdResource()
                ->appleIdConnector()
                ->getSecurityPhoneResources()
                ->securityVerifyPhoneSecurityCode(
                    id: $id,
                    phoneNumber: $phoneNumber,
                    countryCode: $countryCode,
                    countryDialCode: $countryDialCode,
                    code: $code
                )
            ;

            $this->getAppleIdResource()
                ->appleId()
                ->dispatcher()
                ?->dispatch(new VerifySecurityCodeSuccessEvent($this->getAppleIdResource()->appleId(), $response))
            ;

            return $response;
        } catch (RequestException $e) {
            $this->getAppleIdResource()
                ->appleId()
                ->dispatcher()
                ?->dispatch(new VerifySecurityCodeFailedEvent($this->getAppleIdResource()->appleId(), $e))
            ;

            throw $e;
        }
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteSecurityVerify(int $id): DeleteSecurityVerify
    {
        return $this->getAppleIdResource()
            ->appleIdConnector()
            ->getSecurityPhoneResources()
            ->deleteSecurityVerify($id)
        ;
    }

    protected function executeSecurityVerifyPhoneCall(string $countryCode, string $phoneNumber, string $countryDialCode, bool $nonFTEU): SecurityVerifyPhone
    {
        $response = $this->getAppleIdResource()
            ->appleIdConnector()
            ->getSecurityPhoneResources()
            ->securityVerifyPhone(
                countryCode: $countryCode,
                phoneNumber: $phoneNumber,
                countryDialCode: $countryDialCode,
                nonFTEU: $nonFTEU
            )
        ;

        $this->getAppleIdResource()
            ->appleId()
            ->dispatcher()
            ?->dispatch(new SendPhoneSecurityCodeSuccessEvent($this->getAppleIdResource()->appleId(), $response));

        return $response;
    }
}
