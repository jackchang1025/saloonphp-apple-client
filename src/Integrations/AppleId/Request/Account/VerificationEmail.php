<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate\VerificationEmail as VerificationEmailDto;

class VerificationEmail extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        public VerificationEmailDto $data,
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
    
}