<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Exception\RegistrationException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Data\CreateAccountFieldsSrvResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Request\CreateAccountFieldsSrvRequest;

class Resources extends BaseResource
{
    /**
     * @throws RegistrationException
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createAccountFieldsSrv(): CreateAccountFieldsSrvResponse
    {
        $response = $this->getConnector()
            ->send(new CreateAccountFieldsSrvRequest())->dto()
        ;

        if (0 === $response->status) {
            return $response;
        }

        throw new RegistrationException($response->getResponse()->body());
    }
}
