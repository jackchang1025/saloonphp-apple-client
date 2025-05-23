<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Contracts\CalculateAppleHc;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\Validate;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Account\Verification\VerificationPhone as VerificationPhoneResponse;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;
use Weijiajia\SaloonphpAppleClient\Plugins\HasCalculateAppleHc;

class VerificationPhone extends BaseAccount implements HasBody, CalculateAppleHc
{
    use HasJsonBody;
    use HasAcceptsJson;
    use HasCalculateAppleHc;
    protected Method $method = Method::PUT;

    public function __construct(
        public Validate $data,
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public string $appleRequestContext = 'create',
    ) {}

    public function resolveEndpoint(): string
    {
        return '/account/verification/phone';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): VerificationPhoneResponse
    {
        return VerificationPhoneResponse::from($response->json());
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
