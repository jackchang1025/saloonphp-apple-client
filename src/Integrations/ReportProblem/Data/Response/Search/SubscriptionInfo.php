<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search;

use Spatie\LaravelData\Data;

class SubscriptionInfo extends Data
{
    public function __construct(
        public ?array $trunkPricings = null,
        public ?array $branchPricings = null,
        public ?bool $isContingentPricingTrunk = null,
        public ?bool $isContingentPricingBranch = null,
        public ?bool $shouldDisplayImpactReport = null,
    ) {}
}
