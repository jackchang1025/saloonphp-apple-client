<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\VerificationEmail as VerificationEmailDto;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;
class VerificationEmail extends BaseAccount implements HasBody
{
    use HasJsonBody;
    use HasAcceptsJson;
    protected Method $method = Method::PUT;

    public function __construct(
        public VerificationEmailDto $data,
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public string $appleRequestContext = 'create',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/account/verification';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
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