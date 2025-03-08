<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search;

use Spatie\LaravelData\Data;

class Pli extends Data
{
    public function __construct(
        public string $itemId,
        public string $purchaseId,
        public string $storefrontId,
        public string $adamId,
        public string $guid,
        public string $amountPaid,
        public string $pliDate,
        public bool $isFreePurchase,
        public bool $isCredit,
        public string $lineItemType,
        public ?string $title = null,
        public ?LocalizedContent $localizedContent = null,
        public ?SubscriptionInfo $subscriptionInfo = null,
    ) {
    }
}
