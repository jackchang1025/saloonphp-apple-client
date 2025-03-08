<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Token\Token;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\ValidatePassword\ValidatePassword;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\TokenRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AuthenticatePasswordRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class AuthenticateResources extends BaseResource
{
    /**
     * @param string $password
     *
     * @return ValidatePassword
     * @throws FatalRequestException
     *
     * @throws RequestException
     */
    public function authenticatePassword(string $password): ValidatePassword
    {
        return $this->getConnector()
            ->send(new AuthenticatePasswordRequest($password))->dto();
    }

    /**
     * @return Token
     * @throws FatalRequestException
     *
     * @throws RequestException
     */
    public function token(): Token
    {
        return $this->getConnector()->send(new TokenRequest())->dto();
    }
}
