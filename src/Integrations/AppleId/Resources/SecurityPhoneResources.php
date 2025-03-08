<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Weijiajia\SaloonphpAppleClient\Exception\BindPhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\ErrorException;
use Weijiajia\SaloonphpAppleClient\Exception\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\PhoneNumberAlreadyExistsException;
use Weijiajia\SaloonphpAppleClient\Exception\StolenDeviceProtectionException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone\SecurityVerifyPhoneRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone\SecurityVerifyPhoneSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class SecurityPhoneResources extends BaseResource
{
    /**
     * @param string $countryCode
     * @param string $phoneNumber
     * @param string $countryDialCode
     * @param bool $nonFTEU
     *
     * @return SecurityVerifyPhone
     * @throws BindPhoneException
     * @throws ErrorException
     * @throws FatalRequestException
     * @throws PhoneException
     * @throws PhoneNumberAlreadyExistsException
     * @throws StolenDeviceProtectionException
     * @throws VerificationCodeSentTooManyTimesException|RequestException
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
                )->dto();

        } catch (ClientException  $e) {
            /**
             * @var Response $response
             */
            $response = $e->getResponse();

            if ($response->status() === 423) {
                throw new VerificationCodeSentTooManyTimesException(
                    response: $response
                );
            }

            $error = $response->getFirstServiceError();

            if ($response->status() === 467) {
                throw  new StolenDeviceProtectionException(
                    response: $response, message: $error?->getMessage(
                ) ?? '已开启“失窃设备保护”，无法在网页上更改部分账户信息。 若要添加电话号码，请使用其他 Apple 设备'
                );
            }

            //28248 验证码无法发送至该电话号码。请稍后重试。
            //21651 电话号码无效
            if ($error?->getCode() === '-28248' || $error?->getCode() === '-21651') {
                throw new PhoneException(
                    response: $response
                );
            }

            //24054 暂时无法使用此电话号码。请稍后再试
            if ($error?->getCode() === '-22979' || $error?->getCode() === '-24054') {
                throw new VerificationCodeSentTooManyTimesException(
                    response: $response
                );
            }

            //Error Description not available
            if ($error?->getCode() === '-22420') {
                throw new ErrorException(
                    response: $response
                );
            }

            if ($error?->getCode() === 'phone.number.already.exists') {
                throw new PhoneNumberAlreadyExistsException(
                    response: $response
                );
            }

            throw new BindPhoneException(
                response: $response
            );
        }
    }

    /**
     * @param int $id
     * @param string $phoneNumber
     * @param string $countryCode
     * @param string $countryDialCode
     * @param string $code
     *
     * @return SecurityVerifyPhone
     * @throws FatalRequestException
     *
     * @throws RequestException
     */
    public function securityVerifyPhoneSecurityCode(
        int $id,
        string $phoneNumber,
        string $countryCode,
        string $countryDialCode,
        string $code
    ): SecurityVerifyPhone {
        return $this->getConnector()
            ->send(
                new SecurityVerifyPhoneSecurityCodeRequest($id, $phoneNumber, $countryCode, $countryDialCode, $code)
            )->dto();
    }
}
