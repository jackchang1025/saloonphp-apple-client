<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyDetails;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class FamilyDetails extends Data
{
    public function __construct(
        public string $statusMessage,
        public int $dsid,
        public bool $isMemberOfFamily,
        public int $status,
        #[DataCollectionOf(PendingMember::class)]
        public ?DataCollection $pendingMembers = null,
        #[DataCollectionOf(FamilyMember::class)]
        public ?DataCollection $familyMembers = null,
    ) {}
}
