<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Exception\AccountException;
use Weijiajia\SaloonphpAppleClient\Exception\CreateAccountException;
use Weijiajia\SaloonphpAppleClient\Exception\RegistrationException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateAccountSrvData;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateAccountSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateOptionsResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\GenerateEmailConfirmationCodeSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateAccountFieldsSrvData;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateAccountFieldsSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateEmailConfirmationCodeSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\CreateAccountSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\CreateOptionsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\GenerateEmailConfirmationCodeSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\PodRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\ValidateAccountFieldsSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\ValidateEmailConfirmationCodeSrvRequest;

class Resources extends BaseResource
{
    /**
     * @throws AccountException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function validateAccountFieldsSrv(ValidateAccountFieldsSrvData $data): ValidateAccountFieldsSrvResponse
    {
        $response = $this->getConnector()
            ->send(new ValidateAccountFieldsSrvRequest($data))->dto()
        ;

        if (0 === $response->status) {
            return $response;
        }

        throw new AccountException($response->getResponse()->body());
    }

    /**
     * @throws VerificationCodeException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function generateEmailConfirmationCodeSrv(string $email): GenerateEmailConfirmationCodeSrvResponse
    {
        $response = $this->getConnector()
            ->send(new GenerateEmailConfirmationCodeSrvRequest($email))->dto()
        ;

        if (0 === $response->status) {
            return $response;
        }

        throw new VerificationCodeException($response->getResponse()->body());
    }

    /**
     * @throws RegistrationException
     * @throws VerificationCodeException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function validateEmailConfirmationCodeSrv(string $email, string $clientToken, string $secretCode): ValidateEmailConfirmationCodeSrvResponse
    {
        $response = $this->getConnector()
            ->send(new ValidateEmailConfirmationCodeSrvRequest($email, $clientToken, $secretCode))->dto()
        ;

        if (0 !== $response->status) {
            throw new RegistrationException($response->getResponse()->body());
        }

        $validationResults = $response->getResponse()->json('validationResults');

        if (!empty($validationResults[0]['error'])) {
            throw new VerificationCodeException($response->getResponse()->body());
        }

        return $response;
    }

    /**
     * @throws CreateAccountException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createAccountSrv(string $token, CreateAccountSrvData $data): CreateAccountSrvResponse
    {
        $response = $this->getConnector()
            ->send(new CreateAccountSrvRequest($token, $data))->dto()
        ;

        if (0 === $response->status) {
            return $response;
        }

        throw new CreateAccountException($response->getResponse()->body());
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createOptions(string $restrictedAccountType = 'restrictedEmailOptimizedWeb'): CreateOptionsResponse
    {
        return $this->getConnector()
            ->send(new CreateOptionsRequest($restrictedAccountType))->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function pod(): Response
    {
        return $this->getConnector()
            ->send(new PodRequest());
    }
}
