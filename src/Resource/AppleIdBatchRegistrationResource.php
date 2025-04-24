<?php

namespace Weijiajia\SaloonphpAppleClient\Resource;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Widget\Account as AccountDto;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
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
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\VerificationEmail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification\SendVerificationEmail;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Account\Verification\SendVerificationEmail as SendVerificationEmailResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Captcha\Captcha as CaptchaResponse;
use Weijiajia\SaloonphpAppleClient\Apple;

class AppleIdBatchRegistrationResource extends Resource
{
    protected ?AccountDto $widgetAccount = null;
    
    protected ?AppleIdConnector $appleIdConnector = null;

    public function __construct(Apple $apple,protected string $widgetKey='af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3')
    {
        parent::__construct($apple);
    }

    public function widgetKey(): string
    {
        return $this->widgetKey;
    }
    
    public function appleIdConnector(): AppleIdConnector
    {
        return $this->appleIdConnector ?? new AppleIdConnector($this->apple());
    }

    /**
     * @return AccountDto
     * @throws FatalRequestException
     * @throws RequestException
     */
    protected function widgetAccount(): AccountDto
    {
        return $this->widgetAccount ??= $this->appleIdConnector()->getAccountResource()->widgetAccount(
            widgetKey: $this->widgetKey(),
            referer: 'https://www.icloud.com/',
            appContext: 'icloud',
            lv: '0.3.16'
        );
    }

    protected function captcha(): CaptchaResponse
    {
        return $this->appleIdConnector()->getAccountResource()->captcha(
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }

     /**
     * 验证邮箱和密码
     *
     * @return void
     * @throws AccountAlreadyExistsException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException
     */
    protected function validateEmailAndPassword(string $name, string $password): void
    {
        $this->appleIdConnector()->getAccountResource()->appleid(
            $name,
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );

        $this->appleIdConnector()->getAccountResource()->password(
            $name,
            $password,
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }

     /**
     * 验证验证码
     *
     * @return Response 验证响应
     * @throws AccountAlreadyExistsException
     * @throws CaptchaException
     * @throws ClientException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException|RegistrationException
     */
    protected function validateCaptcha(Validate $validate): Response
    {
        return $this->appleIdConnector()->getAccountResource()->validate(
            validateDto: $validate,
            appleIdSessionId: $this->widgetAccount()->appleSessionId(),
            appleWidgetKey: $this->widgetKey()
        );
    }

    /**
     * @return SendVerificationEmailResponse
     * @throws FatalRequestException
     * @throws RequestException
     */
    protected function sendVerificationEmail(SendVerificationEmail $sendVerificationEmail): SendVerificationEmailResponse
    {
        return $this->appleIdConnector()
            ->getAccountResource()
            ->sendVerificationEmail(
                $sendVerificationEmail,
                $this->widgetAccount()->appleSessionId(),
                $this->widgetKey()
            )
            ->dto();
    }

     /**
     * 验证邮箱验证码
     *
     * @return Response 验证响应
     * @throws ClientException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException|VerificationCodeException
     */
    protected function verifyEmailCode(string $name, string $verificationInfo): Response
    {
        return $this->appleIdConnector()->getAccountResource()->verificationEmail(
            VerificationEmail::from([
                'name'             => $name,
                'verificationInfo' => $verificationInfo,
            ]),
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }

     /**
     * 发送手机验证码
     *
     * @param int $attempts 尝试次数
     * @return Response 发送响应
     * @throws ClientException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws PhoneException
     * @throws RegistrationException
     * @throws RequestException
     * @throws VerificationCodeSentTooManyTimesException
     */
    protected function attemptSendPhoneVerificationCode(int $attempts = 5 ,Validate $validate): Response
    {
        for ($i = 0; $i < $attempts; $i++) {
            try {
                return $this->appleIdConnector()
                    ->getAccountResource()
                    ->sendVerificationPhone(
                        $validate,
                        $this->widgetAccount()->appleSessionId(),
                        $this->widgetKey()
                    );
            } catch (PhoneException $e) {

            }
        }

        throw new PhoneException("发送手机验证码失败，已尝试 {$attempts} 次");
    }


    /**
     * 验证手机验证码
     *
     * @return Response 验证响应
     * @throws ClientException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException|VerificationCodeException
     */
    protected function verifyPhoneCode(Validate $validate): Response
    {
        return $this->appleIdConnector()->getAccountResource()->verificationPhone(
            $validate,
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }
}