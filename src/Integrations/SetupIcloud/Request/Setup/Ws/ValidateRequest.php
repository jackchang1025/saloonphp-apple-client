<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\Setup\Ws;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class ValidateRequest extends Request
{

    protected Method $method = Method::POST;

    public function __construct(
        public string $clientBuildNumber,
        public string $clientMasteringNumber,
        public string $clientId,
    ) {

    }

    public function resolveEndpoint(): string
    {
        return "/setup/ws/1/validate?clientBuildNumber={$this->clientBuildNumber}&clientMasteringNumber={$this->clientMasteringNumber}&clientId={$this->clientId}";
    }

    protected function defaultHeaders(): array
    {
        return [
            'Referer' => 'https://www.icloud.com',
            'Origin' => 'https://www.icloud.com',
        ];
    }
}