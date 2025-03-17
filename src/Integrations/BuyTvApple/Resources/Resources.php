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


class Resources extends BaseResource
{
    public function validateAccountFieldsSrv(ValidateAccountFieldsSrvData $data): ValidateAccountFieldsSrvResponse
    {
        $request = new ValidateAccountFieldsSrvRequest($data);
        $response = $this->getConnector()
            ->send($request);

        $data = $request->createDtoFromResponse($response);

        if ($data->status === 0) {
            return $data;
        }

        throw new AccountException($response->body());
    }

    public function generateEmailConfirmationCodeSrv(string $email): GenerateEmailConfirmationCodeSrvResponse
    {
        $request = new GenerateEmailConfirmationCodeSrvRequest($email);
        $response = $this->getConnector()
            ->send($request);

        $data = $request->createDtoFromResponse($response);

        if ($data->status === 0) {
            return $data;
        }

        throw new VerificationCodeException($response->body());
    }

    public function validateEmailConfirmationCodeSrv(string $email, string $clientToken, string $secretCode): ValidateEmailConfirmationCodeSrvResponse
    {
        $request = new ValidateEmailConfirmationCodeSrvRequest($email, $clientToken, $secretCode);
        $response = $this->getConnector()
            ->send($request);

        $data = $request->createDtoFromResponse($response);

        if ($data->status === 0) {
            return $data;
        }

        throw new VerificationCodeException($response->body());
    }

    public function createAccountSrv(CreateAccountSrvData $data): CreateAccountSrvResponse
    {
        $request = new CreateAccountSrvRequest($data);
        $response = $this->getConnector()
            ->send($request);

        $data = $request->createDtoFromResponse($response);

        if ($data->status === 0) {
            return $data;
        }

        throw new CreateAccountException($response->body());
    }
}

