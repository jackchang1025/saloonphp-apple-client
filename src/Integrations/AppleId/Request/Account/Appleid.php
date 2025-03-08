<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class Appleid extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    

    public function __construct(
        public string $emailAddress,
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
}