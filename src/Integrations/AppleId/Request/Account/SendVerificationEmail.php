<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification\SendVerificationEmail as SendVerificationEmailData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Account\Verification\SendVerificationEmail as SendVerificationEmailResponse;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;

class SendVerificationEmail extends BaseAccount implements HasBody
{
    use HasJsonBody;
    use HasAcceptsJson;
    protected Method $method = Method::POST;

    public function __construct(
        public SendVerificationEmailData $data,
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public string $appleRequestContext = 'create',
    ) {}

    public function resolveEndpoint(): string
    {
        return '/account/verification';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }

    public function createDtoFromResponse(Response $response): SendVerificationEmailResponse
    {
        return SendVerificationEmailResponse::from($response->json());
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
