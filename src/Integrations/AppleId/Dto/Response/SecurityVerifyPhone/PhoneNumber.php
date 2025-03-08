<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PhoneNumber extends Data
{
    public function __construct(
        public bool $deviceType,
        public bool $nonFTEU,
        public bool $iMessageType,
        public bool $pacType,
        public bool $complianceType,
        public bool $appleComplianceType,
        public string $numberWithDialCode,
        public string $numberWithDialCodeAndExtension,
        public string $rawNumber,
        public string $fullNumberWithCountryPrefix,
        public bool $sameAsAppleID,
        public bool $verified,
        public string $countryCode,
        public string $pushMode,
        public string $countryDialCode,
        public string $number,
        public bool $vetted,
        public string $rawNumberWithDialCode,
        public bool $pending,
        public string $lastTwoDigits,
        public bool $loginHandle,
        public string $countryCodeAsString,
        public string $obfuscatedNumber,
        public string $name,
        public ?int $id = null,
        public ?string $createDate = null,
        public ?string $updateDate = null,
    ) {
    }
}
