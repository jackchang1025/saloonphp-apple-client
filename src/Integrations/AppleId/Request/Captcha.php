<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Captcha\Captcha as CaptchaDto;

class Captcha extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $type = 'IMAGE',
    ) {
    }

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

    public function createDtoFromResponse(Response $response): CaptchaDto
    {
        return CaptchaDto::from($response->json());
    }
}