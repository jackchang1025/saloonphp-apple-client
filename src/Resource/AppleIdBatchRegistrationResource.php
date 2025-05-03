<?php

namespace Weijiajia\SaloonphpAppleClient\Resource;

use Weijiajia\SaloonphpAppleClient\Exception\DescriptionNotAvailableException;
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
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;

class AppleIdBatchRegistrationResource extends Resource
{
    protected ?AccountDto $widgetAccount = null;

    protected ?AppleIdConnector $appleIdConnector = null;

    public function __construct(
        AppleId $appleId,
        protected string $widgetKey = 'd39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d'
    ) {
        parent::__construct($appleId);
    }

    public function resetWidgetAccount(): void
    {
        $this->widgetAccount = null;
    }

    public function captcha(): CaptchaResponse
    {
        return $this->appleIdConnector()->getAccountResource()->captcha(
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }

    public function appleIdConnector(): AppleIdConnector
    {
        return $this->appleIdConnector ?? new AppleIdConnector($this->appleId());
    }

    /**
     * @return AccountDto
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function widgetAccount(): AccountDto
    {
        return $this->widgetAccount ??= $this->appleIdConnector()->getAccountResource()->widgetAccount(
            widgetKey: $this->widgetKey(),
            referer: 'https://www.icloud.com/',
            appContext: 'icloud',
            lv: '0.3.16'
        );
    }

    public function widgetKey(): string
    {
        return $this->widgetKey;
    }

    /**
     * 验证邮箱和密码
     *
     * @param string $name
     * @param string $password
     * @return void
     * @throws AccountAlreadyExistsException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RequestException
     */
    public function validateEmailAndPassword(string $name, string $password): void
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
     * @throws RequestException|RegistrationException|VerificationCodeSentTooManyTimesException
     */
    public function validateCaptcha(Validate $validate): Response
    {
        return $this->appleIdConnector()->getAccountResource()->validate(
            validateDto: $validate,
            appleIdSessionId: $this->widgetAccount()->appleSessionId(),
            appleWidgetKey: $this->widgetKey()
        );
    }

    /**
     * @param SendVerificationEmail $sendVerificationEmail
     * @return SendVerificationEmailResponse
     * @throws FatalRequestException
     * @throws RequestException
     * @throws CaptchaException
     * @throws RegistrationException
     */
    public function sendVerificationEmail(SendVerificationEmail $sendVerificationEmail): SendVerificationEmailResponse
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
    public function verifyEmailCode(VerificationEmail $verificationEmail): Response
    {
        return $this->appleIdConnector()->getAccountResource()->verificationEmail(
            $verificationEmail,
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
     * @throws VerificationCodeSentTooManyTimesException|CaptchaException
     */
    public function attemptSendPhoneVerificationCode(Validate $validate, int $attempts = 5): Response
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
    public function verifyPhoneCode(Validate $validate): Response
    {
        return $this->appleIdConnector()->getAccountResource()->verificationPhone(
            $validate,
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }

    /**
     * 创建账号
     *
     * @param Validate $validate
     * @return Response 创建响应
     * @throws ClientException
     * @throws FatalRequestException
     * @throws JsonException
     * @throws RegistrationException
     * @throws RequestException
     * @throws DescriptionNotAvailableException
     */
    public function createAccount(Validate $validate): Response
    {
        return $this->appleIdConnector()->getAccountResource()->account(
            $validate,
            $this->widgetAccount()->appleSessionId(),
            $this->widgetKey()
        );
    }
}