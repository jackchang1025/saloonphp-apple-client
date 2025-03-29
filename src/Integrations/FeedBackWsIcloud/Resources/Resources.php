<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Request\ReportStatsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\FeedBackWsIcloud\Data\ReportStats;
use Saloon\Http\Response;
    
class Resources extends BaseResource
{
    /**
     * @param ReportStats $reportStats
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function reportStats(ReportStats $reportStats): Response
    {
        return $this->getConnector()
            ->send(new ReportStatsRequest($reportStats));
    }
}
