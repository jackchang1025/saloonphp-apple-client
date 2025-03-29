<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Contracts\Body\HasBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate;
use Weijiajia\SaloonphpAppleClient\Contracts\CalculateAppleHc;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;
use Weijiajia\SaloonphpAppleClient\Plugins\HasCalculateAppleHc;

class Account extends BaseAccount implements HasBody,CalculateAppleHc
{

    use HasJsonBody;
    use HasAcceptsJson;
    use HasCalculateAppleHc;

    protected Method $method = Method::POST;

    public function __construct(
        public Validate $data,
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public string $appleRequestContext = 'create',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/account';
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