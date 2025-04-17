<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\AccountLogin;

use Spatie\LaravelData\Data;

class DsInfo extends Data
{
    public function __construct(
        public string $lastName,
        public string $dsid,
        public string $firstName,
        public string $fullName,
        public string $appleId,
        public string $primaryEmail,
        public string $countryCode,
        public bool $isManagedAppleID,
        public bool $hasPaymentInfo,
        public bool $familyEligible,
        public array $appleIdEntries,
        public array $mailFlags,
        public array $beneficiaryInfo,
    ) {
    }
}
