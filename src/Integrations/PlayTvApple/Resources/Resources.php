<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Request\CreateAccountFieldsSrvRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\PlayTvApple\Data\CreateAccountFieldsSrvResponse;
use Weijiajia\SaloonphpAppleClient\Exception\RegistrationException;

class Resources extends BaseResource
{

    /**
     * @return CreateAccountFieldsSrvResponse
     * @throws RegistrationException
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function createAccountFieldsSrv(): CreateAccountFieldsSrvResponse
    {
        $response = $this->getConnector()
            ->send(new CreateAccountFieldsSrvRequest())->dto();
        
        if ($response->status === 0) {
            return $response;
        }

        throw new RegistrationException($response->getResponse()->body());
    }
}

