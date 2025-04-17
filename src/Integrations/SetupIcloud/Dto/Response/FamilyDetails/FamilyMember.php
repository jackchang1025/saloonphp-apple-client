<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyDetails;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\CamelCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class FamilyMember extends Data
{
    public function __construct(
        public string $memberFirstName,
        public int $memberSortOrder,
        #[MapInputName('member-altDSID')]
        public string $memberAltDSID,
        public bool $memberIsParentAccount,
        public bool $memberIsOrganizer,
        public string $memberDsidHash,
        public bool $isMe,
        public bool $memberIsChildAccount,
        public int $memberTypeEnum,
        public bool $isItunesLinked,
        public int $memberDsid,
        public int $memberJoinDateEpoch,
        public string $memberStatus,
        public string $memberDisplayLabel,
        public string $memberInviteEmail,
        public string $memberType,
        public int $linkedItunesAccountDsid,
        public string $memberAppleId,
        public string $memberLastName,
        public bool $isAskToBuyEnabled,
        public string $linkedItunesAccountAppleid
    ) {
    }
}
