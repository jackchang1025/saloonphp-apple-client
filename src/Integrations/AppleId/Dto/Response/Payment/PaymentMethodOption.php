<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;


use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\MapInputName;

class PaymentMethodOption extends Data
{
    public function __construct(
        #[MapInputName('option')]
        public Option $option
    ) {
    }
}
