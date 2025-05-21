<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Captcha\Captcha as CaptchaResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\BaseAccount;
use Weijiajia\SaloonphpAppleClient\Plugins\HasAcceptsJson;

class Captcha extends BaseAccount implements HasBody
{
    use HasJsonBody;
    use HasAcceptsJson;

    protected Method $method = Method::POST;

    public function __construct(
        public string $appleIdSessionId,
        public string $appleWidgetKey,
        public string $type = 'IMAGE',
        public string $appleRequestContext = 'create',
    ) {}

    public function resolveEndpoint(): string
    {
        return '/captcha';
    }

    public function defaultBody(): array
    {
        return [
            'type' => $this->type,
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

    public function createDtoFromResponse(Response $response): CaptchaResponse
    {
        return CaptchaResponse::from($response->json());
    }
}
