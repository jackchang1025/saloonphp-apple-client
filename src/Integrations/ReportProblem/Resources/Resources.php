<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Resources;

use Illuminate\Support\Collection;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Login;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search\SearchResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Request\Api\LoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Request\Api\Purchase\Search\SearchRequest;

class Resources extends BaseResource
{
    /**
     * 执行登录操作.
     *
     * 此方法通过发送登录请求来实现用户登录，返回登录信息对象
     *
     * @return Login 登录信息对象
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function login(): Login
    {
        return $this->getConnector()->send(new LoginRequest())->dto();
    }

    /**
     * 搜索集合.
     *
     * 此方法根据提供的dsid和xAppleXsrfToken搜索相关集合，并将结果作为集合对象返回
     *
     * @param string $dsid            用户标识符
     * @param string $xAppleXsrfToken 安全令牌
     *
     * @return Collection 搜索结果集合
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function searchCollection(string $dsid, string $xAppleXsrfToken): Collection
    {
        return collect(iterator_to_array($this->generateSearchResults($dsid, $xAppleXsrfToken)));
    }

    /**
     * 执行搜索操作.
     *
     * 此方法根据提供的参数执行一次搜索操作，并返回搜索响应对象
     * 如果提供了批次ID，则使用该ID进行后续搜索
     *
     * @param string      $dsid            用户标识符
     * @param string      $xAppleXsrfToken 安全令牌
     * @param null|string $batchId         搜索批次ID，如果不提供则为 null
     *
     * @return SearchResponse 搜索响应对象
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(string $dsid, string $xAppleXsrfToken, ?string $batchId = null): SearchResponse
    {
        return $this->getConnector()->send(new SearchRequest($dsid, $xAppleXsrfToken, $batchId))->dto();
    }

    /**
     * 生成搜索结果的函数.
     *
     * 该函数通过迭代方式生成搜索结果它不断地调用search函数来获取分批次的搜索结果，
     * 并通过yield语句逐一返回每个批次的响应当没有更多结果时（即响应中不再包含下一批次的ID），
     * 函数自动终止迭代这种方式适用于处理大量数据，因为它允许逐批次处理结果，而不是一次性加载所有结果
     *
     * @param string $dsid            Apple服务的用户ID，用于标识用户
     * @param string $xAppleXsrfToken 安全令牌，用于验证请求的合法性
     *
     * @return iterable 返回一个可迭代对象，包含每次搜索的响应
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    private function generateSearchResults(string $dsid, string $xAppleXsrfToken): iterable
    {
        // 初始化批次ID为null，用于在第一次搜索时指示从头开始
        $batchId = null;
        // 使用无限循环进行搜索，直到没有更多结果为止
        while (true) {
            // 调用search函数进行搜索，并传入当前批次ID
            $response = $this->search($dsid, $xAppleXsrfToken, $batchId);

            // 通过yield语句返回搜索响应，允许迭代访问
            yield $response;

            // 检查响应中是否包含下一批次的ID
            if ($response->nextBatchId) {
                // 如果有，更新批次ID为下一批次的ID，继续下一次搜索
                $batchId = $response->nextBatchId;
            } else {
                // 如果没有，表明这是最后一批结果，终止循环
                break;
            }
        }
    }
}
