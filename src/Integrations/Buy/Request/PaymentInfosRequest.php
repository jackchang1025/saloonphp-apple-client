<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class PaymentInfosRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public string $context = 'CWA', public bool $isVideoEverywhere = true)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/account/stackable/paymentInfos';
    }

    public function defaultQuery(): array
    {
        return [
            'context'           => $this->context,
            'isVideoEverywhere' => $this->isVideoEverywhere,
        ];
    }

    public function defaultHeaders(): array
    {
        return [
            'Host'    => 'buy.apps.apple.com',
            'Origin'  => 'https://apps.apple.com',
            'Referer' => 'https://apps.apple.com/',
        ];
    }
}
