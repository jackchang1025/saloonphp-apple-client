<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search;

use Spatie\LaravelData\Data;

class LocalizedContent extends Data
{
    public function __construct(
        public ?string $nameForDisplay = null,
        public ?string $detailForDisplay = null,
        public ?string $invoiceLine3 = null,
        public ?string $artworkURL = null,
        public ?string $supportURL = null,
        public ?string $mediaType = null,
        public ?string $subscriptionCoverageDescription = null,
        public bool $complete = false,
    ) {
    }
}
