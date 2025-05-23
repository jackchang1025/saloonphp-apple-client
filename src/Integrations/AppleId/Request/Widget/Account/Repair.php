<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Widget\Account;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class Repair extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public string $widgetKey, public string $rv = '11', public string $language = 'en_US_USA') {}

    public function resolveEndpoint(): string
    {
        return '/widget/account/repair?widgetKey='.$this->widgetKey.'&rv='.$this->rv.'&language='.$this->language;
    }
}
