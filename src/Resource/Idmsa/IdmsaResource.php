<?php
declare(strict_types=1);
namespace Weijiajia\SaloonphpAppleClient\Resource\Idmsa;

use JsonException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Resource\Resource;
use Weijiajia\SaloonphpAppleClient\DataConstruct\NullData;
use Weijiajia\SaloonphpAppleClient\Exception\SignInException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\SignIn\SignInComplete as IdmsaSignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Request\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendDeviceSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInComplete as SignInCompleteResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\Auth as AppleAuth;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendPhoneVerificationCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\VerifyPhoneSecurityCode\VerifyPhoneSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\AppleAuthenticationConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\IdmsaConnector;
use Weijiajia\SaloonphpAppleClient\Events\SignInSuccessEvent;
use Weijiajia\SaloonphpAppleClient\Events\SignInFailedEvent;
use Weijiajia\SaloonphpAppleClient\Events\SendPhoneSecurityCodeSuccessEvent;
use Weijiajia\SaloonphpAppleClient\Events\SendPhoneSecurityCodeFailedEvent;
use Weijiajia\SaloonphpAppleClient\Events\SendVerificationCodeSuccessEvent;
use Weijiajia\SaloonphpAppleClient\Events\SendVerificationCodeFailedEvent;
use Weijiajia\SaloonphpAppleClient\Events\VerifySecurityCodeSuccessEvent;
use Weijiajia\SaloonphpAppleClient\Events\VerifySecurityCodeFailedEvent;

abstract class IdmsaResource extends Resource
{

    protected ?AppleAuth $appleAuth = null;

    protected ?AppleAuthenticationConnector $appleAuthenticationConnector = null;

    protected ?IdmsaConnector $idmsaConnector = null;

    /**
     * 用户登录方法
     *
     * @return SignInCompleteResponse 登录完成的响应数据
     * @throws FatalRequestException 请求失败异常
     * @throws RequestException 请求异常
     * @throws JsonException JSON 解析异常
     * @throws SignInException
     */
    public function signIn(): SignInCompleteResponse
    {
        try {
            $account = $this->appleId();

            $initData = $this->appleAuthenticationConnector()
                ->getAuthenticationResource()
            ->signInInit(
                $account->appleId()
            );

            $signInInitData = $this
                ->idmsaConnector()
                ->getAuthenticateResources()
                ->signInInit(a: $initData->value, account: $account->appleId());

            $completeResponse = $this->appleAuthenticationConnector()
                ->getAuthenticationResource()
                ->signInComplete(
                    SignInComplete::from(
                        [
                            'key'       => $initData->key,
                            'salt'      => $signInInitData->salt,
                            'b'         => $signInInitData->b,
                            'c'         => $signInInitData->c,
                            'password'  => $account->password(),
                            'iteration' => $signInInitData->iteration,
                            'protocol'  => $signInInitData->protocol,
                        ]
                    )
                );

            $response = $this->idmsaConnector()
                ->getAuthenticateResources()
                ->signInComplete(
                    IdmsaSignInComplete::from([
                        'account' => $account->appleId(),
                        'm1'      => $completeResponse->M1,
                        'm2'      => $completeResponse->M2,
                        'c'       => $completeResponse->c,
                    ])
                );

            $this->appleId()
            ->dispatcher()
            ?->dispatch(new SignInSuccessEvent($this->appleId(),$response));

            return $response;

        } catch (\Throwable $e) {

            $this->appleId()
            ->dispatcher()
            ?->dispatch(new SignInFailedEvent($this->appleId(),$e));
            throw $e;
        }
    }

    public function appleAuthenticationConnector(): AppleAuthenticationConnector
    {
        return $this->appleAuthenticationConnector ?? new AppleAuthenticationConnector(
            $this->appleId()->config()->get('apple_auth_url'),
            $this->appleId()
        );
    }

    abstract public function idmsaConnector(): IdmsaConnector;

    /**
     * 发送手机安全码
     *
     * @param int $id 手机号码ID
     * @return SendPhoneVerificationCode 发送响应数据
     * @throws FatalRequestException 请求失败异常
     * @throws RequestException 请求异常
     * @throws VerificationCodeSentTooManyTimesException 发送次数过多异常
     */
    public function sendPhoneSecurityCode(int $id): SendPhoneVerificationCode
    {
        try {
            $response = $this->idmsaConnector()
                ->getAuthenticateResources()
                ->sendPhoneSecurityCode($id);

            $this->appleId()
                ->dispatcher()
                ?->dispatch(new SendPhoneSecurityCodeSuccessEvent($this->appleId(),$response));

            return $response;
        } catch (\Throwable $e) {

            $this->appleId()
                ->dispatcher()
                ?->dispatch(new SendPhoneSecurityCodeFailedEvent($this->appleId(),$e));
            throw $e;
        }
    }

    /**
     * 发送验证码
     *
     * @return SendDeviceSecurityCode 发送响应数据
     * @throws FatalRequestException 请求失败异常
     * @throws RequestException 请求异常
     */
    public function sendVerificationCode(): SendDeviceSecurityCode
    {
        try {
            $response = $this->idmsaConnector()
                ->getAuthenticateResources()
                ->sendSecurityCode();

            $this->appleId()
                ->dispatcher()
                ?->dispatch(new SendVerificationCodeSuccessEvent($this->appleId(),$response));
            return $response;
        } catch (\Throwable $e) {
            $this->appleId()
                ->dispatcher()
                ?->dispatch(new SendVerificationCodeFailedEvent($this->appleId(),$e));
            throw $e;
        }
    }


    /**
     * 验证手机验证码
     *
     * @param int $id
     * @param string $code 验证码
     * @return VerifyPhoneSecurityCode 验证响���数据
     * @throws FatalRequestException 请求失败异常
     * @throws RequestException 请求异常
     * @throws VerificationCodeException 验证码异常
     */
    public function verifyPhoneVerificationCode(int|string $id, string $code): VerifyPhoneSecurityCode
    {
        try {
            $response = $this->idmsaConnector()
                ->getAuthenticateResources()
                ->verifyPhoneCode((string) $id, $code);

            $this->appleId()
                ->dispatcher()
                ?->dispatch(new VerifySecurityCodeSuccessEvent($this->appleId(),$response));
            return $response;
        } catch (\Throwable $e) {
            $this->appleId()
                ->dispatcher()
                ?->dispatch(new VerifySecurityCodeFailedEvent($this->appleId(),$e));
            throw $e;
        }
    }

    /**
     * 验证安全码
     *
     * @param string $code 安全码
     * @return NullData 验证响应数据
     * @throws RequestException|FatalRequestException|JsonException|VerificationCodeException 请求异常
     */
    public function verifySecurityCode(string $code): NullData
    {
        try {

            $response = $this->idmsaConnector()
                ->getAuthenticateResources()
                ->verifySecurityCode($code);

            $this->appleId()
                ->dispatcher()
                ?->dispatch(new VerifySecurityCodeSuccessEvent($this->appleId(),$response));
            return $response;
        } catch (\Throwable $e) {

            $this->appleId()
                ->dispatcher()
                ?->dispatch(new VerifySecurityCodeFailedEvent($this->appleId(),$e));
            throw $e;
        }
    }

    /**
     * @return AppleAuth
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function appleAuth(): AppleAuth
    {
        return $this->appleAuth ??= $this->idmsaConnector()->getAuthenticateResources()->auth();
    }
}
