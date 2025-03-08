<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Request\Api\Purchase\Search;

use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search\SearchResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SearchRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $dsid,
        protected string $xAppleXsrfToken,
        protected ?string $batchId = null
    ) {
    }

    public function createDtoFromResponse(Response $response): SearchResponse
    {
        return SearchResponse::from($response->json());
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Xsrf-Token' => $this->xAppleXsrfToken,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/api/purchase/search';
    }

    public function defaultBody(): array
    {
        return [
            'dsid' => $this->dsid,
            'batchId' => $this->batchId,
        ];
    }
}
