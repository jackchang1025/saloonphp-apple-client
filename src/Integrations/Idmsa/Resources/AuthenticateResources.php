<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources;

use Weijiajia\SaloonphpAppleClient\Config\Config;
use Weijiajia\SaloonphpAppleClient\DataConstruct\NullData;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\SignIn\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\Auth;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendDeviceSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendPhoneVerificationCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInComplete as SignInCompleteResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInInit;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\VerifyPhoneSecurityCode\VerifyPhoneSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\AuthorizeSignInRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\AuthorizeSingRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\AuthRepairCompleteRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\AuthRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\SendPhoneSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\SendTrustedDeviceSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\SignInCompleteRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\SignInInitRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\VerifyPhoneSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\VerifyTrustedDeviceSecurityCodeRequest;
use Saloon\Http\Response;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class AuthenticateResources extends BaseResource
{

    /**
     * @param string $a
     * @param string $account
     *
     * @return SignInInit
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function signInInit(string $a, string $account): SignInInit
    {
        return $this->getConnector()
            ->send(new SignInInitRequest($a, $account))
            ->dto();
    }


    /**
     * @param SignInComplete $data
     * @return SignInCompleteResponse
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function signInComplete(SignInComplete $data): SignInCompleteResponse
    {
        return $this->getConnector()->send(
            new SignInCompleteRequest($data)
        )->dto();
    }

    /**
     * @param string $frameId
     * @param string $clientId
     * @param string $redirectUri
     * @param string $state
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sign(string $frameId, string $clientId, string $redirectUri, string $state): Response
    {
        return $this->getConnector()->send(
            new AuthorizeSignInRequest(
                frameId: $frameId,
                clientId: $clientId,
                redirectUri: $redirectUri,
                state: $state,
            )
        );
    }

    /**
     * @param string $accountName
     * @param string $password
     * @param bool $rememberMe
     *
     * @return Response
     * @throws RequestException
     *
     * @throws FatalRequestException
     */
    public function authorizeSing(string $accountName, string $password, bool $rememberMe = true): Response
    {
        return $this->getConnector()->send(new AuthorizeSingRequest($accountName, $password, $rememberMe));
    }

    /**
     * @return Auth
     * @throws RequestException
     *
     * @throws FatalRequestException
     */
    public function auth(): Auth
    {
        return $this->getConnector()->send(new AuthRequest())->dto();
    }

    /**
     * @param string $code
     *
     * @return NullData
     * @throws RequestException
     * @throws VerificationCodeException
     *
     * @throws FatalRequestException
     */
    public function verifySecurityCode(string $code): NullData
    {
        try {

            return $this->getConnector()
                ->send(new VerifyTrustedDeviceSecurityCodeRequest($code))
                ->dto();

        } catch (RequestException $e) {
            /**
             * @var Response $response
             */
            $response = $e->getResponse();

            if ($response->status() === 400) {
                throw new VerificationCodeException(
                    $response,
                    $response->getFirstServiceError()?->getMessage() ?? '验证码错误'
                );
            }

            if ($response->status() === 412) {
                return $this->managePrivacyAccept()->dto();
            }

            throw $e;
        }
    }

    /**
     * @return Response
     * @throws RequestException
     *
     * @throws FatalRequestException
     */
    public function managePrivacyAccept(): Response
    {
        return $this->getConnector()->send(new AuthRepairCompleteRequest());
    }

    /**
     * @param string $id
     * @param string $code
     *
     * @return VerifyPhoneSecurityCode
     * @throws RequestException
     * @throws VerificationCodeException
     *
     * @throws FatalRequestException
     */
    public function verifyPhoneCode(string $id, string $code): VerifyPhoneSecurityCode
    {
        try {

            return $this->getConnector()
                ->send(new VerifyPhoneSecurityCodeRequest($id, $code))
                ->dto();

        } catch (RequestException $e) {
            /**
             * @var Response $response
             */
            $response = $e->getResponse();

            if ($response->status() === 400) {
                throw new VerificationCodeException(
                    $response,
                    $response->getFirstServiceError()?->getMessage() ?? '验证码错误'
                );
            }

            if ($response->status() === 412) {
                $this->managePrivacyAccept();

                return $response->dto();
            }

            throw $e;
        }
    }

    /**
     * @return SendDeviceSecurityCode
     * @throws RequestException
     *
     * @throws FatalRequestException
     */
    public function sendSecurityCode(): SendDeviceSecurityCode
    {
        return $this->getConnector()->send(new SendTrustedDeviceSecurityCodeRequest())->dto();
    }

    /**
     * @param int $id
     *
     * @return SendPhoneVerificationCode
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeSentTooManyTimesException
     */
    public function sendPhoneSecurityCode(int $id): SendPhoneVerificationCode
    {
        try {

            return $this->getConnector()->send(new SendPhoneSecurityCodeRequest($id))->dto();

        } catch (RequestException $e) {

            /**
             * @var Response $response
             */
            $response = $e->getResponse();

            if ($response->status() === 423) {
                throw new VerificationCodeSentTooManyTimesException(
                    $response,
                    $response->getFirstServiceError()?->getMessage() ?? '验证码发送次数过多'
                );
            }

            throw $e;
        }
    }
}
