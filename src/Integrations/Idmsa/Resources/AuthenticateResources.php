<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources;

use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\DataConstruct\NullData;
use Weijiajia\SaloonphpAppleClient\Exception\SignInException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentToBeTimeException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\VerifyEmailSecurityCode\VerifyEmailSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\SignIn\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\Auth;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\VerifyEmailSecurityCode\VerifyEmailSecurityCodeResponse;
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
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\VerifyEmailSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\VerifyPhoneSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth\VerifyTrustedDeviceSecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Response\Response;

class AuthenticateResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function signInInit(string $a, string $account): SignInInit
    {
        return $this->getConnector()
            ->send(new SignInInitRequest($a, $account))
            ->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws SignInException
     * @throws RequestException
     */
    public function signInComplete(SignInComplete $data): SignInCompleteResponse
    {
        try {
            return $this->getConnector()->send(new SignInCompleteRequest($data))->dto();
        } catch (ClientException $e) {
            throw new SignInException($e->getResponse()->body());
        }
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function signIn(string $frameId, string $iframeId, string $clientId, string $redirectUri, string $state, string $language = 'en_US', string $skVersion = '7', string $authVersion = 'latest', string $responseType = 'code', string $responseMode = 'web_message'): Response
    {
        return $this->getConnector()->send(
            new AuthorizeSignInRequest(
                frameId: $frameId,
                iframeId: $iframeId,
                clientId: $clientId,
                redirectUri: $redirectUri,
                state: $state,
                responseType: $responseType,
                responseMode: $responseMode,
                language: $language,
                skVersion: $skVersion,
                authVersion: $authVersion,
            )
        );
    }

    /**
     * @throws RequestException
     * @throws FatalRequestException
     */
    public function authorizeSing(string $accountName, string $password, bool $rememberMe = true): Response
    {
        return $this->getConnector()->send(new AuthorizeSingRequest($accountName, $password, $rememberMe));
    }

    /**
     * @throws RequestException
     * @throws FatalRequestException
     */
    public function auth(): Auth
    {
        return $this->getConnector()->send(new AuthRequest())->dto();
    }

    /**
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws FatalRequestException
     */
    public function verifySecurityCode(string $code): NullData
    {
        try {
            return $this->getConnector()
                ->send(new VerifyTrustedDeviceSecurityCodeRequest($code))
                ->dto()
            ;
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (400 === $response->status()) {
                throw new VerificationCodeException($response->body());
            }

            if (412 === $response->status()) {
                return $this->managePrivacyAccept()->dto();
            }

            throw $e;
        }
    }

    /**
     * @throws RequestException
     * @throws FatalRequestException
     */
    public function managePrivacyAccept(): Response
    {
        return $this->getConnector()->send(new AuthRepairCompleteRequest());
    }

    /**
     * @throws RequestException
     * @throws VerificationCodeException
     * @throws FatalRequestException
     */
    public function verifyPhoneCode(string $id, string $code): VerifyPhoneSecurityCode
    {
        try {
            return $this->getConnector()
                ->send(new VerifyPhoneSecurityCodeRequest($id, $code))
                ->dto()
            ;
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (400 === $response->status()) {
                throw new VerificationCodeException($response->body());
            }

            if (412 === $response->status()) {
                $this->managePrivacyAccept();

                return $response->dto();
            }

            throw $e;
        }
    }

    /**
     * @throws RequestException
     * @throws FatalRequestException
     */
    public function sendSecurityCode(): SendDeviceSecurityCode
    {
        return $this->getConnector()->send(new SendTrustedDeviceSecurityCodeRequest())->dto();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeSentTooManyTimesException
     */
    public function sendPhoneSecurityCode(int $id): SendPhoneVerificationCode
    {
        try {
            return $this->getConnector()->send(new SendPhoneSecurityCodeRequest($id))->dto();
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (423 === $response->status()) {
                throw new VerificationCodeSentTooManyTimesException($response->body());
            }

            $serviceErrors = $response->getFirstServiceError();
            if ('-28248' === $serviceErrors?->getCode()) {
                throw new VerificationCodeSentToBeTimeException($response->body());
            }

            throw $e;
        }
    }

    /**
     * @throws ClientException
     * @throws FatalRequestException
     * @throws RequestException
     * @throws VerificationCodeException
     */
    public function verifyEmailSecurityCode(VerifyEmailSecurityCode $data): VerifyEmailSecurityCodeResponse
    {
        try {
            return $this->getConnector()->send(new VerifyEmailSecurityCodeRequest($data))->dto();
        } catch (ClientException $e) {
            $response = $e->getResponse();

            if (400 === $response->status()) {
                throw new VerificationCodeException($response->body());
            }

            if (412 === $response->status()) {
                return $response->dto();
            }

            throw $e;
        }
    }
}
