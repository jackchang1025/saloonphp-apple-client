<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Purchase extends Data
{
    public function __construct(
        public string $purchaseId,
        public string $dsid,
        public ?string $invoiceAmount,
        #[DataCollectionOf(Pli::class)]
        public DataCollection $plis,
        public string $weborder,
        public ?string $invoiceDate,
        public string $purchaseDate,
        public bool $isPendingPurchase,
        public ?string $estimatedTotalAmount,
    ) {
    }
}
