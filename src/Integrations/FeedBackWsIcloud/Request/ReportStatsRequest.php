<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Request;

use Saloon\Contracts\Body\HasBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Data\ReportStats;

class ReportStatsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public ReportStats $reportStats,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/reportStats';
    }

    public function defaultBody(): array
    {
        return $this->reportStats->toArray();
    }
}