<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search;

use Spatie\LaravelData\Data;

class SearchQuery extends Data
{
    public function __construct(
        public ?string $batchId,
        public ?string $dsid,
        public ?string $dsids,
        public ?string $guid,
        public ?string $purchaseAmount,
        public ?string $searchTerm,
        public ?string $weborder,
        public ?array $plis,
        public ?array $adamIds,
    ) {
    }
}
