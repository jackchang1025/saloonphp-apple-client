<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class SearchResponse extends Data
{
    public function __construct(
        public ?string $batchId,
        public ?string $nextBatchId,
        public SearchQuery $query,
        #[DataCollectionOf(Purchase::class)]
        public DataCollection $purchases,
    ) {
    }
}
