<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\FamilyInfo;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Family extends Data
{
    public function __construct(
        public string $familyId,
        public string $organizer,
        public string $etag,
        public array $transferRequests = [],
        public array $invitations = [],
        public array $members = [],
        public array $outgoingTransferRequests = [],
    ) {
    }
}
