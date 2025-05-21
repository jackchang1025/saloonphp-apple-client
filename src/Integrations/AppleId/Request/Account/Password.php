<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;

class Password extends BaseAccount implements HasBody
{
    use HasJsonBody;
    use HasAcceptsJson;
    protected Method $method = Method::POST;

    public function __construct(
        public string $accountName,
        public string $password,
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public bool $updating = false,
        public string $appleRequestContext = 'create',
    ) {}

    public function resolveEndpoint(): string
    {
        return '/account/validate/password';
    }

    public function defaultBody(): array
    {
        return [
            'password' => $this->password,
            'accountName' => $this->accountName,
            'updating' => $this->updating,
        ];
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Id-Session-Id' => $this->appleIdSessionId,
            'X-Apple-Widget-Key' => $this->appleWidgetKey,
            'X-Apple-Request-Context' => $this->appleRequestContext,
        ];
    }
}
