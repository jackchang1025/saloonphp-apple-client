<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Contracts\Body\HasBody;

class PodRequest extends Request
{

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/account/pod';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type'                    => 'application/json',
        ];
    }
    
}
