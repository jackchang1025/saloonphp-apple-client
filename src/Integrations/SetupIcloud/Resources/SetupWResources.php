<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\Setup\Ws\ValidateRequest;
use Weijiajia\SaloonphpAppleClient\Response\Response;
class SetupWResources extends BaseResource
{
    /**
     * @param string $clientBuildNumber
     * @param string $clientMasteringNumber
     * @param string $clientId
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function validate(string $clientBuildNumber, string $clientMasteringNumber, string $clientId): Response
    {
        return $this->getConnector()
            ->send(new ValidateRequest($clientBuildNumber, $clientMasteringNumber, $clientId));
    }

    
}
