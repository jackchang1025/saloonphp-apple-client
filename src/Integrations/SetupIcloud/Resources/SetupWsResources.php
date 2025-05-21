<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\Setup\Ws\CreateLiteAccount;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\Setup\Ws\GetTerms;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\Setup\Ws\CreateLiteAccountRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\Setup\Ws\GetTermsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\Setup\Ws\ValidateRequest;
use Weijiajia\SaloonphpAppleClient\Response\Response;

class SetupWsResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function validate(string $clientBuildNumber, string $clientMasteringNumber, string $clientId): Response
    {
        return $this->getConnector()
            ->send(new ValidateRequest($clientBuildNumber, $clientMasteringNumber, $clientId))
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTerms(string $clientBuildNumber, string $clientMasteringNumber, string $clientId, GetTerms $data): Response
    {
        return $this->getConnector()
            ->send(new GetTermsRequest($clientBuildNumber, $clientMasteringNumber, $clientId, $data))
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createLiteAccount(string $clientBuildNumber, string $clientMasteringNumber, string $clientId, CreateLiteAccount $data): Response
    {
        return $this->getConnector()
            ->send(new CreateLiteAccountRequest($clientBuildNumber, $clientMasteringNumber, $clientId, $data))
        ;
    }
}
