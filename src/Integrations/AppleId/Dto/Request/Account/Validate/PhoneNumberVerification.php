<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class PhoneNumberVerification extends Data
{
    public function __construct(
        public PhoneNumber $phoneNumber,
        public string $mode,
        public ?SecurityCode $securityCode = null,
    ) {}
}
