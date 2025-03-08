<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

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

class AccountResource extends BaseResource
{
    public function account(ValidateDto $validateDto): Response
    {
        return $this->connector->send(new Account($validateDto));
    }

    public function captcha(): Response
    {
        return $this->connector->send(new Captcha());
    }

    /**
     * @param ValidateDto $validateDto
     * @return Response
     * @throws CaptchaException
     */
    public function validate(ValidateDto $validateDto): Response
    {

        try {

            return $this->connector->send(new Validate($validateDto));

        } catch (\Saloon\Exceptions\Request\ClientException  $e) {

            $validationErrors = $e->getResponse()->json('validationErrors');

            if ($validationErrors[0]['code'] ?? '' === 'captchaAnswer.Invalid') {
                throw new CaptchaException(message: json_encode($validationErrors));
            }

            throw $e;
        }
    }

    public function sendVerificationEmail(SendVerificationEmailData $sendVerificationEmailData): Response
    {
        return $this->connector->send(new SendVerificationEmail($sendVerificationEmailData));
    }

    public function verificationEmail(VerificationEmailData $verificationEmailData): Response
    {
        try {
            return $this->connector->send(new VerificationEmail($verificationEmailData));

        } catch (\Saloon\Exceptions\Request\ClientException  $e) {

            $validationErrors = $e->getResponse()->json('service_errors');

            if ($validationErrors[0]['code'] ?? '' === '-21418') {
                throw new VerificationCodeException(message: json_encode($validationErrors));
            }

            throw $e;
        }
    }

    public function sendVerificationPhone(ValidateDto $validateDto):Response
    {
        try {

            return $this->connector->send(new SendVerificationPhone($validateDto));

        } catch (\Saloon\Exceptions\Request\ClientException  $e) {

            $validationErrors = $e->getResponse()->json('service_errors');

                if ($validationErrors[0]['code'] ?? '' === '-28248') {//34607001

                    throw new PhoneException(message: json_encode($validationErrors));
                }

                throw $e;
        }
    }

    public function verificationPhone(ValidateDto $validateDto): Response
    {
        return $this->connector->send(new VerificationPhone($validateDto));
    }

    public function appleid(string $emailAddress): Response
    {
        return $this->connector->send(new Appleid($emailAddress));
    }

    public function password(string $accountName, string $password, bool $updating = false): Response
    {
        return $this->connector->send(new Password($accountName,$password, $updating));
    }

    public function widgetAccount(
        string $appContext = 'account',
        string $widgetKey = 'af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3',
        string $lv = '0.3.17',
        ?string $referer = null
        ): Response
    {
        return $this->connector->send(new WidgetAccount(appContext:$appContext,widgetKey:$widgetKey,lv:$lv,referer:$referer));
    }
}