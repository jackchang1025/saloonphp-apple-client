<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment\WechatPay;

use Spatie\LaravelData\Data;

class WechatPayUrl extends Data
{
    public function __construct(public ?string $partnerToken = null, public ?string $url = null) {}
}
