<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class PhoneNumber extends Data
{
    public function __construct(
        public int $id,
        public string $number,
        public string $countryCode,
        public string $countryDialCode,
        public bool $nonFTEU,
    ) {}
}