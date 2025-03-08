<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class Password extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    // {
    //     "password": "AIzaSyAT3i6K6b23iTDAyx7GUWFdxDN_Zr0AY4Q",
    //     "accountName": "admin@xxxxxx.team",
    //     "updating": false
    // }
    public function __construct(
        public string $accountName,
        public string $password,
        public bool $updating = false,
    ) {
    }

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

    
    
}