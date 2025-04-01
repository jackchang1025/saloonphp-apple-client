<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use JsonException;
use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Exception\AccountAlreadyExistsException;
use Weijiajia\SaloonphpAppleClient\Exception\CaptchaException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\RegistrationException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate as ValidateDto;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\VerificationEmail as VerificationEmailData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification\SendVerificationEmail as SendVerificationEmailData;
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
     * @param ValidateDto $validateDto
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RegistrationException
     * @throws RequestException
     */
    public function account(ValidateDto $validateDto, string $appleIdSessionId, string $appleWidgetKey): Response
    {
        try {

            return $this->connector->send(
                new Account(data: $validateDto, appleIdSessionId: $appleIdSessionId, appleWidgetKey: $appleWidgetKey)
            );
        }catch (ClientException $e) {

            //Could Not Create Account
            $validationErrors = $e->getResponse()->json('service_errors');
            if ($validationErrors[0]['code'] ?? '' === '-34607001') {
                throw new RegistrationException($e->getResponse()->body());
            }

            throw $e;
        }
    }

    /**
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return CaptchaResponse
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
     * @param ValidateDto $validateDto
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws AccountAlreadyExistsException
     * @throws CaptchaException
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException|RegistrationException
     */
    public function validate(ValidateDto $validateDto, string $appleIdSessionId, string $appleWidgetKey): Response
    {

        try {

            return $this->connector->send(
                new Validate(data: $validateDto, appleIdSessionId: $appleIdSessionId, appleWidgetKey: $appleWidgetKey)
            );

        } catch (ClientException  $e) {

            $validationErrors = $e->getResponse()->json('validationErrors');

            //account already exists
            if (($validationErrors[0]['code'] ?? '') === 'SecurityQuestion.Default.values' || ($validationErrors[0]['code'] ?? '') === 'accountName.alreadyUsed') {
                throw new AccountAlreadyExistsException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            //captcha answer invalid
            if (($validationErrors[0]['code'] ?? '') === 'captchaAnswer.Invalid') {
                throw new CaptchaException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            //Could Not Create Account
            $validationErrors = $e->getResponse()->json('service_errors');
            if ($validationErrors[0]['code'] ?? '' === '-34607001') {
                throw new RegistrationException($e->getResponse()->body());
            }

            throw $e;
        }
    }

    /**
     * @param SendVerificationEmailData $sendVerificationEmailData
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendVerificationEmail(
        SendVerificationEmailData $sendVerificationEmailData,
        string $appleIdSessionId,
        string $appleWidgetKey
    ): Response {
        return $this->connector->send(
            new SendVerificationEmail(
                data: $sendVerificationEmailData,
                appleIdSessionId: $appleIdSessionId,
                appleWidgetKey: $appleWidgetKey
            )
        );
    }

    /**
     * @param VerificationEmailData $verificationEmailData
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws JsonException
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

            if ($validationErrors[0]['code'] ?? '' === '-21418') {
                throw new VerificationCodeException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @param ValidateDto $validateDto
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws PhoneException
     * @throws RequestException
     * @throws JsonException
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

            if ($validationErrors[0]['code'] ?? '' === '-28248') {

                throw new PhoneException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @param ValidateDto $validateDto
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws JsonException
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

            if ($validationErrors[0]['code'] ?? '' === '-21669') {

                throw new VerificationCodeException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @param string $emailAddress
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @return Response
     * @throws AccountAlreadyExistsException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
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

        if ($response->json('used') === true) {
            throw new AccountAlreadyExistsException($response->body());
        }

        return $response;
    }

    /**
     * @param string $accountName
     * @param string $password
     * @param string $appleIdSessionId
     * @param string $appleWidgetKey
     * @param bool $updating
     * @return Response
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
     * @param string $widgetKey
     * @param string $referer
     * @param string $appContext
     * @param string $lv
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function widgetAccount(
        string $widgetKey,
        string $referer,
        string $appContext = 'account',
        string $lv = '0.3.17',
    ): Response {
        return $this->connector->send(
            new WidgetAccount(
                widgetKey: $widgetKey,
                referer: $referer,
                appContext: $appContext,
                lv: $lv
            )
        );
    }
}