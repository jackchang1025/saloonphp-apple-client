<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment;

use Spatie\LaravelData\Data;

class PhoneNumber extends Data
{
    public function __construct(
        public string $areaCode,
        public string $number,
        public string $countryCode,
    ) {}
}
