<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\Setup\Ws;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasStringBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\Setup\Ws\CreateLiteAccount;

class CreateLiteAccountRequest extends Request implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $clientBuildNumber,
        public string $clientMasteringNumber,
        public string $clientId,
        public CreateLiteAccount $data,
    ) {}

    public function resolveEndpoint(): string
    {
        return "setup/ws/1/createLiteAccount?clientBuildNumber={$this->clientBuildNumber}&clientMasteringNumber={$this->clientMasteringNumber}&clientId={$this->clientId}";
    }

    protected function defaultBody(): ?string
    {
        return json_encode($this->data->toArray());
    }
}
