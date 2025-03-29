<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;


use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;

class Appleid extends BaseAccount implements HasBody
{
    use HasJsonBody;
    use HasAcceptsJson;

    protected Method $method = Method::POST;
    

    public function __construct(
        public string $emailAddress,
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public string $appleRequestContext = 'create',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/account/validation/appleid';
    }

    public function defaultBody(): array
    {
        return [
            'emailAddress' => $this->emailAddress,
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