<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Account;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Captcha;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Validate;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate as ValidateDto;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Appleid;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Password;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Widget\Account as WidgetAccount;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\SendVerificationPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\VerificationPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification\SendVerificationEmail as SendVerificationEmailData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\SendVerificationEmail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\VerificationEmail as VerificationEmailData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\VerificationEmail;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Exception\CaptchaException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\AccountAlreadyExistsException;
class AccountResource extends BaseResource
{
    /**
     * @param ValidateDto $validateDto
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function account(ValidateDto $validateDto): Response
    {

        return $this->connector->send(new Account($validateDto));
    }

    /**
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function captcha(): Response
    {
        return $this->connector->send(new Captcha());
    }

    /**
     * @param ValidateDto $validateDto
     * @return Response
     * @throws CaptchaException
     * @throws \JsonException
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws AccountAlreadyExistsException
     */
    public function validate(ValidateDto $validateDto): Response
    {

        try {

            return $this->connector->send(new Validate($validateDto));

        } catch (ClientException  $e) {

            $validationErrors = $e->getResponse()->json('validationErrors');

             //account already exists
             if ($validationErrors[0]['code'] ?? '' === 'SecurityQuestion.Default.values') {
                throw new AccountAlreadyExistsException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            //captcha answer invalid
            if ($validationErrors[0]['code'] ?? '' === 'captchaAnswer.Invalid') {
                throw new CaptchaException(message: json_encode($validationErrors, JSON_THROW_ON_ERROR));
            }

            throw $e;
        }
    }

    /**
     * @param SendVerificationEmailData $sendVerificationEmailData
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendVerificationEmail(SendVerificationEmailData $sendVerificationEmailData): Response
    {
        return $this->connector->send(new SendVerificationEmail($sendVerificationEmailData));
    }

    /**
     * @param VerificationEmailData $verificationEmailData
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws \JsonException
     */
    public function verificationEmail(VerificationEmailData $verificationEmailData): Response
    {
        try {
            return $this->connector->send(new VerificationEmail($verificationEmailData));

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
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws PhoneException
     * @throws RequestException
     * @throws \JsonException
     */
    public function sendVerificationPhone(ValidateDto $validateDto):Response
    {
        try {

            return $this->connector->send(new SendVerificationPhone($validateDto));

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
     * @return Response
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws \JsonException
     */
    public function verificationPhone(ValidateDto $validateDto): Response
    {
        try {

            return $this->connector->send(new VerificationPhone($validateDto));

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
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function appleid(string $emailAddress): Response
    {
        return $this->connector->send(new Appleid($emailAddress));
    }

    /**
     * @param string $accountName
     * @param string $password
     * @param bool $updating
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function password(string $accountName, string $password, bool $updating = false): Response
    {
        return $this->connector->send(new Password($accountName,$password, $updating));
    }

    /**
     * @param string $appContext
     * @param string $widgetKey
     * @param string $lv
     * @param string|null $referer
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function widgetAccount(
        string $appContext = 'account',
        string $widgetKey = 'af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3',
        string $lv = '0.3.17',
        ?string $referer = null
        ): Response
    {
        return $this->connector->send(new WidgetAccount(
            widgetKey: $widgetKey,
            appContext: $appContext,
            lv: $lv,
            referer: $referer
        ));
    }
}