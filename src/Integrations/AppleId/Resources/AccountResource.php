<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Exception\AccountAlreadyExistsException;
use Weijiajia\SaloonphpAppleClient\Exception\CaptchaException;
use Weijiajia\SaloonphpAppleClient\Exception\DescriptionNotAvailableException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\PhoneFormatException;
use Weijiajia\SaloonphpAppleClient\Exception\RegistrationException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentToBeTimeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate as ValidateDto;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\VerificationEmail as VerificationEmailData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification\SendVerificationEmail as SendVerificationEmailData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Widget\Account as AccountDto;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Captcha\Captcha as CaptchaResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Account;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Appleid;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Password;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\SendVerificationEmail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\SendVerificationPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Validate;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\VerificationEmail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\VerificationPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Widget\Account as WidgetAccount;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Captcha;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class AccountResource extends BaseResource
{
    /**
     * @throws ClientException
     * @throws FatalRequestException
     * @throws \JsonException
     * @throws RegistrationException
     * @throws RequestException
     * @throws DescriptionNotAvailableException
     */
    public function account(ValidateDto $validateDto, string $appleIdSessionId, string $appleWidgetKey): Response
    {
        try {
            return $this->connector->send(
                new Account(data: $validateDto, appleIdSessionId: $appleIdSessionId, appleWidgetKey: $appleWidgetKey)
            );
        } catch (ClientException $e) {
            // Could Not Create Account
            $validationErrors = $e->getResponse()->json('service_errors');
            if (($validationErrors[0]['code'] ?? '') === '-34607001') {
                throw new RegistrationException($e->getResponse()->body());
            }
            // Error Description not available
            if (($validationErrors[0]['code'] ?? '') === '-27589') {
                throw new DescriptionNotAvailableException($e->getResponse()->body());
            }

            throw $e;
        }
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function captcha(string $appleIdSessionId, string $appleWidgetKey): CaptchaResponse
    {
        return $this->connector->send(
            new Captcha(appleIdSessionId: $appleIdSessionId, appleWidgetKey: $appleWidgetKey)
        )->dto();
    }

    /**
     * @throws AccountAlreadyExistsException
     * @throws CaptchaException
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws \JsonException|RegistrationException|VerificationCodeSentTooManyTimesException
     */
    public function validate(ValidateDto $validateDto, string $appleIdSessionId, string $appleWidgetKey): Response
    {
        try {
            return $this->connector->send(
                new Validate(data: $validateDto, appleIdSessionId: $appleIdSessionId, appleWidgetKey: $appleWidgetKey)
            );
        } catch (ClientException  $e) {
            $validationErrors = $e->getResponse()->json('validationErrors');

            // account already exists
            if (($validationErrors[0]['code'] ?? '') === 'SecurityQuestion.Default.values' || ($validationErrors[0]['code'] ?? '') === 'accountName.alreadyUsed') {
                throw new AccountAlreadyExistsException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            // captcha answer invalid
            if (($validationErrors[0]['code'] ?? '') === 'captchaAnswer.Invalid') {
                throw new CaptchaException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            // phone number invalid
            // "validationErrors": [
            //     {
            //         "code": "ExceedsLength",
            //         "path": "phoneNumberVerification.phoneNumber.number",
            //         "title": "Nomor Telepon Tidak Valid",
            //         "message": "Masukkan nomor telepon yang valid.",
            //         "suppressDismissal": false
            //     }
            // ]
            if (($validationErrors[0]['path'] ?? '') === 'phoneNumberVerification.phoneNumber.number') {
                throw new PhoneFormatException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            // Could Not Create Account
            $validationErrors = $e->getResponse()->json('service_errors');
            if (($validationErrors[0]['code'] ?? '') === '-34607001') {
                throw new RegistrationException($e->getResponse()->body());
            }

            // Verification Code Sent Too Many Times
            if (($validationErrors[0]['code'] ?? '') === '-24059') {
                throw new VerificationCodeSentTooManyTimesException($e->getResponse()->body());
            }

            throw $e;
        }
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws CaptchaException
     * @throws RegistrationException
     * @throws DescriptionNotAvailableException
     * @throws VerificationCodeSentToBeTimeException
     */
    public function sendVerificationEmail(
        SendVerificationEmailData $sendVerificationEmailData,
        string $appleIdSessionId,
        string $appleWidgetKey
    ): Response {
        try {
            return $this->connector->send(
                new SendVerificationEmail(
                    data: $sendVerificationEmailData,
                    appleIdSessionId: $appleIdSessionId,
                    appleWidgetKey: $appleWidgetKey
                )
            );
        } catch (ClientException  $e) {
            $validationErrors = $e->getResponse()->json('validationErrors');

            // captcha answer invalid
            if (($validationErrors[0]['code'] ?? '') === 'captchaAnswer.Invalid') {
                throw new CaptchaException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            // Could Not Create Account
            $validationErrors = $e->getResponse()->json('service_errors');

            if (($validationErrors[0]['code'] ?? '') === '-34607001') {
                throw new RegistrationException($e->getResponse()->body());
            }

            // Error Description not available
            if (($validationErrors[0]['code'] ?? '') === '-27589') {
                throw new DescriptionNotAvailableException($e->getResponse()->body());
            }

            if (($validationErrors[0]['code'] ?? '') === '-23590') {
                // A new code can’t be sent at this time. Enter the last code you received or try again later.
                throw new VerificationCodeSentToBeTimeException($e->getResponse()->body());
            }

            throw $e;
        }
    }

    /**
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws \JsonException
     */
    public function verificationEmail(
        VerificationEmailData $verificationEmailData,
        string $appleIdSessionId,
        string $appleWidgetKey
    ): Response {
        try {
            return $this->connector->send(
                new VerificationEmail(
                    data: $verificationEmailData,
                    appleIdSessionId: $appleIdSessionId,
                    appleWidgetKey: $appleWidgetKey
                )
            );
        } catch (ClientException  $e) {
            $validationErrors = $e->getResponse()->json('service_errors');

            if (($validationErrors[0]['code'] ?? '') === '-21418') {
                throw new VerificationCodeException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @throws ClientException
     * @throws FatalRequestException
     * @throws \JsonException
     * @throws PhoneException
     * @throws RegistrationException
     * @throws RequestException
     * @throws CaptchaException|VerificationCodeSentTooManyTimesException
     */
    public function sendVerificationPhone(
        ValidateDto $validateDto,
        string $appleIdSessionId,
        string $appleWidgetKey
    ): Response {
        try {
            return $this->connector->send(
                new SendVerificationPhone(
                    data: $validateDto,
                    appleIdSessionId: $appleIdSessionId,
                    appleWidgetKey: $appleWidgetKey
                )
            );
        } catch (ClientException  $e) {
            $validationErrors = $e->getResponse()->json('service_errors');

            if (($validationErrors[0]['code'] ?? '') === '-28248') {
                throw new PhoneException(message: $e->getResponse()->body());
            }

            if (($validationErrors[0]['code'] ?? '') === '-34607001') {
                throw new RegistrationException(message: $e->getResponse()->body());
            }

            if (($validationErrors[0]['code'] ?? '') === '-24059') {
                throw new VerificationCodeSentTooManyTimesException(message: $e->getResponse()->body());
            }

            if (423 === $e->getResponse()->status()) {
                throw new VerificationCodeSentTooManyTimesException(message: $e->getResponse()->body());
            }

            $validationErrors = $e->getResponse()->json('validationErrors');
            // captcha answer invalid
            if (($validationErrors[0]['code'] ?? '') === 'captchaAnswer.Invalid') {
                throw new CaptchaException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws \JsonException
     */
    public function verificationPhone(
        ValidateDto $validateDto,
        string $appleIdSessionId,
        string $appleWidgetKey
    ): Response {
        try {
            return $this->connector->send(
                new VerificationPhone(
                    data: $validateDto,
                    appleIdSessionId: $appleIdSessionId,
                    appleWidgetKey: $appleWidgetKey
                )
            );
        } catch (ClientException  $e) {
            $validationErrors = $e->getResponse()->json('service_errors');

            if (($validationErrors[0]['code'] ?? '') === '-21669') {
                throw new VerificationCodeException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @throws AccountAlreadyExistsException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws \JsonException
     */
    public function appleid(string $emailAddress, string $appleIdSessionId, string $appleWidgetKey): Response
    {
        $response = $this->connector->send(
            new Appleid(
                emailAddress: $emailAddress,
                appleIdSessionId: $appleIdSessionId,
                appleWidgetKey: $appleWidgetKey
            )
        );

        if (true === $response->json('used')) {
            throw new AccountAlreadyExistsException($response->body());
        }

        return $response;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function password(
        string $accountName,
        string $password,
        string $appleIdSessionId,
        string $appleWidgetKey,
        bool $updating = false
    ): Response {
        return $this->connector->send(
            new Password(
                accountName: $accountName,
                password: $password,
                appleIdSessionId: $appleIdSessionId,
                appleWidgetKey: $appleWidgetKey,
                updating: $updating
            )
        );
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function widgetAccount(
        string $widgetKey,
        string $referer,
        string $appContext = 'account',
        string $lv = '0.3.17',
    ): AccountDto {
        return $this->connector->send(
            new WidgetAccount(
                widgetKey: $widgetKey,
                referer: $referer,
                appContext: $appContext,
                lv: $lv
            )
        )->dto();
    }
}
