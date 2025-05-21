<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Spatie\LaravelData\Attributes\MapInputName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PaymentMethodOption extends Data
{
    public function __construct(
        #[MapInputName('option')]
        public Option $option
    ) {}
}
