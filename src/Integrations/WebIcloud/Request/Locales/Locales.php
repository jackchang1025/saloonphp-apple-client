<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Request\Locales;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class Locales extends Request
{

    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $clientBuildNumber,
        public readonly string $clientMasteringNumber,
        public readonly string $clientId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/locales/5/en-CA.json?clientBuildNumber=' . $this->clientBuildNumber . '&clientMasteringNumber=' . $this->clientMasteringNumber . '&clientId=' . $this->clientId;
    }

    public function defaultBody(): array{
        return [
            'accept' => '*/*',
        ];
    }
}