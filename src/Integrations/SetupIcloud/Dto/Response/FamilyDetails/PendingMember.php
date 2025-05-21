<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyDetails;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class PendingMember extends Data
{
    public function __construct(
        public string $memberInviteEmail,
        public string $memberStatus,
        public string $memberDisplayLabel
    ) {}
}
