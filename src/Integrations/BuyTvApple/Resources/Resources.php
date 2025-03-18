<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\ValidateAccountFieldsSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateAccountFieldsSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateAccountFieldsSrvData;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\GenerateEmailConfirmationCodeSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\GenerateEmailConfirmationCodeSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\ValidateEmailConfirmationCodeSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\ValidateEmailConfirmationCodeSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\CreateAccountSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateAccountSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateAccountSrvData;
use Weijiajia\SaloonphpAppleClient\Exception\CreateAccountException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\AccountException;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\CreateOptionsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data\CreateOptionsResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request\PodRequest;
use Weijiajia\SaloonphpAppleClient\Exception\RegistrationException;
use Saloon\Http\Response;

class Resources extends BaseResource
{
    public function validateAccountFieldsSrv(ValidateAccountFieldsSrvData $data): ValidateAccountFieldsSrvResponse
    {
        $response = $this->getConnector()
            ->send(new ValidateAccountFieldsSrvRequest($data))->dto();

        if ($response->status === 0) {
            return $response;
        }

        throw new AccountException($response->getResponse()->body());
    }

    public function generateEmailConfirmationCodeSrv(string $email): GenerateEmailConfirmationCodeSrvResponse
    {
        $response = $this->getConnector()
            ->send(new GenerateEmailConfirmationCodeSrvRequest($email))->dto();

        if ($response->status === 0) {
            return $response;
        }

        throw new VerificationCodeException($response->getResponse()->body());
    }

    public function validateEmailConfirmationCodeSrv(string $email, string $clientToken, string $secretCode): ValidateEmailConfirmationCodeSrvResponse
    {
        $response = $this->getConnector()
            ->send(new ValidateEmailConfirmationCodeSrvRequest($email, $clientToken, $secretCode))->dto();

        if ($response->status !== 0) {
            throw new RegistrationException($response->getResponse()->body());
        }

        $validationResults = $response->getResponse()->json('validationResults');

        if(!empty($validationResults[0]['error'])){
            throw new VerificationCodeException($response->getResponse()->body());
        }

        return $response;
    }

    public function createAccountSrv(string $token,CreateAccountSrvData $data): CreateAccountSrvResponse
    {
        $response = $this->getConnector()
            ->send(new CreateAccountSrvRequest($token, $data))->dto();

        if ($response->status === 0) {
            return $response;
        }

        throw new CreateAccountException($response->getResponse()->body());
    }

    public function createOptions(string $restrictedAccountType = 'restrictedEmailOptimizedWeb'): CreateOptionsResponse
    {
        return $this->getConnector()
            ->send(new CreateOptionsRequest($restrictedAccountType))->dto();
    }

    public function pod(): Response
    {
        return $this->getConnector()
            ->send(new PodRequest());
    }
}

