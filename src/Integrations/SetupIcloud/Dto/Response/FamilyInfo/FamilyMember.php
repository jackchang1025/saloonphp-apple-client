<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyInfo;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class FamilyMember extends Data
{
    public function __construct(
        public string $lastName,
        public string $dsid,
        public string $originalInvitationEmail,
        public string $fullName,
        public string $ageClassification,
        public string $appleIdForPurchases,
        public string $appleId,
        public string $familyId,
        public string $firstName,
        public string $dsidForPurchases,
        public bool $hasParentalPrivileges = false,
        public bool $hasScreenTimeEnabled = false,
        public bool $hasAskToBuyEnabled = false,
        public bool $hasSharePurchasesEnabled = false,
        public bool $hasShareMyLocationEnabled = false,
        public array $shareMyLocationEnabledFamilyMembers = [],
    ) {}
}
