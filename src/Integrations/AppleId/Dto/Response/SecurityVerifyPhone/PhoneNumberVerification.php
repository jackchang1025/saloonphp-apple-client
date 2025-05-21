<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\DataConstruct\SecurityCode;

class PhoneNumberVerification extends Data
{
    public function __construct(
        public PhoneNumber $phoneNumber,
        public SecurityCode $securityCode,
        public string $mode,
        public string $type,
        public string $authenticationType,
        public bool $showAutoVerificationUI,
        public string $countryCode,
        public string $countryDialCode,
        public string $number,
        public bool $keepUsing,
        public bool $changePhoneNumber,
        public bool $simSwapPhoneNumber,
        public bool $addDifferent
    ) {}
}
