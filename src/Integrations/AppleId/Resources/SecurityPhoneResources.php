<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Exception\DescriptionNotAvailableException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneNumberAlreadyExistsException;
use Weijiajia\SaloonphpAppleClient\Exception\StolenDeviceProtectionException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\DeleteSecurityVerify;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone\DeleteSecurityVerifyRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone\SecurityVerifyPhoneRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone\SecurityVerifyPhoneSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class SecurityPhoneResources extends BaseResource
{
    /**
     * @throws DescriptionNotAvailableException
     * @throws FatalRequestException
     * @throws PhoneException
     * @throws PhoneNumberAlreadyExistsException
     * @throws StolenDeviceProtectionException
     * @throws RequestException|VerificationCodeSentTooManyTimesException
     */
    public function securityVerifyPhone(
        string $countryCode,
        string $phoneNumber,
        string $countryDialCode,
        bool $nonFTEU = true
    ): SecurityVerifyPhone {
        try {
            return $this->getConnector()
                ->send(
                    new SecurityVerifyPhoneRequest($countryCode, $phoneNumber, $countryDialCode, $nonFTEU)
                )->dto()
            ;
        } catch (ClientException  $e) {
            /**
             * @var Response $response
             */
            $response = $e->getResponse();

            if (423 === $response->status()) {
                throw new VerificationCodeSentTooManyTimesException(
                    $response->body()
                );
            }

            $error = $response->getFirstServiceError();

            // 467 已开启“失窃设备保护”，无法在网页上更改部分账户信息。 若要添加电话号码，请使用其他 Apple 设备
            if (467 === $response->status()) {
                throw new StolenDeviceProtectionException(
                    $response->body()
                );
            }

            // 21651 电话号码无效
            if ('-21651' === $error?->getCode()) {
                throw new PhoneException(
                    $response->body()
                );
            }

            // 24054 暂时无法使用此电话号码。请稍后再试
            // 28248 验证码无法发送至该电话号码。请稍后重试。
            if ('-22979' === $error?->getCode() || '-24054' === $error?->getCode() || '-28248' === $error?->getCode()) {
                throw new VerificationCodeSentTooManyTimesException(
                    $response->body()
                );
            }

            // Error Description not available
            if ('-22420' === $error?->getCode()) {
                throw new DescriptionNotAvailableException(
                    $response->body()
                );
            }

            if ('phone.number.already.exists' === $error?->getCode()) {
                throw new PhoneNumberAlreadyExistsException(
                    $response->body()
                );
            }

            throw $e;
        }
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function securityVerifyPhoneSecurityCode(
        int $id,
        string $phoneNumber,
        string $countryCode,
        string $countryDialCode,
        string $code
    ): SecurityVerifyPhone {
        try {
            return $this->getConnector()
                ->send(
                    new SecurityVerifyPhoneSecurityCodeRequest($id, $phoneNumber, $countryCode, $countryDialCode, $code)
                )->dto()
            ;
        } catch (RequestException $e) {
            $validationErrors = $e->getResponse()->json('service_errors');

            if (($validationErrors[0]['code'] ?? '') === '-22420') {
                throw new DescriptionNotAvailableException(message: $e->getResponse()->body());
            }

            if (($validationErrors[0]['code'] ?? '') === '-21669') {
                throw new VerificationCodeException(message: $e->getResponse()->body());
            }

            throw $e;
        }
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteSecurityVerify(int $id): DeleteSecurityVerify
    {
        return $this->getConnector()
            ->send(new DeleteSecurityVerifyRequest($id))->dto()
        ;
    }
}
