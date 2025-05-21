<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response;

use Spatie\LaravelData\Data;

class LoginConfig extends Data
{
    public function __construct(
        public int $minimumReviewRequestExplanationLength,
        public int $maximumReviewRequestExplanationLength,
        public int $maximumRefundRequestExplanationLength,
        public int $individuallyFetchedPLILimit,
        public int $pliSelectionLimit,
        public int $pliSelectionLimitForTAndSQuestionnaire,
        public int $omnitureEventQueueSizeLimit,
        public bool $omnitureDesired,
        public int $daysInRefundWindow,
        public int $daysInDisputeWindow,
        public int $daysInLookbackWindow,
        public bool $disableMouseTracking,
        public bool $shouldRunQueryTermSearch,
        public bool $figaroDesired,
        public bool $enableAppStore,
        public int $maximumExplanationLength,
        public int $maximumExplanationLengthForDispute,
        public int $maximumExplanationLengthForRefundRequested,
        public int $maximumExplanationLengthForFraudulent,
        public int $maximumExplanationLengthForOffensive,
        public int $maximumExplanationLengthForTAndSQuestionnaire,
        public int $minimumExplanationLengthForTAndSQuestionnaire,
        public bool $enableContingentPricingRefundMessage,
        public bool $enableIndiaTrustAndSafetyMessage,
        public bool $enableTrustAndSafetyRefunds,
        public bool $enableTrustAndSafetyQuestionnaire,
        public bool $shapeDesired,
        public bool $enableServerPliOrdering,
        public bool $enableDisplayCreditAsNegative,
        public bool $enableShowTotalAmount,
        public int $postFetchPLIBatchSize,
        public bool $enableRefundDecisionTimelineText,
    ) {}
}
