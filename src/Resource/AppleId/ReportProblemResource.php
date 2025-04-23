<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\AppleId;

use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Login;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response\Search\SearchResponse;
use Modules\AppleClient\Service\Integrations\ReportProblem\ReportProblemConnector;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class ReportProblemResource
{
    // 可能报告问题的连接器实例，用于与报告问题的API进行通信
    protected ?ReportProblemConnector $reportProblemConnector = null;

    // 登录实例，包含登录相关的数据和方法
    protected ?Login $login = null;

    // 搜索响应实例，用于存储搜索结果
    protected ?SearchResponse $search = null;

    // 搜索集合实例，用于存储搜索集合结果
    protected ?Collection $searchCollection = null;

    // 构造函数，接收一个AppleIdResource实例并将其绑定到当前实例
    public function __construct(protected AppleIdResource $appleIdResource)
    {

    }

    /**
     * 执行搜索操作
     *
     * @param ?string $batchId 批次ID，用于指定特定的搜索批次
     * @return SearchResponse 返回一个SearchResponse实例，包含搜索结果
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(?string $batchId = null): SearchResponse
    {
        // 如果search属性尚未初始化，则执行搜索操作并缓存结果
        return $this->search ??= $this->getReportProblemConnector()
            ->getResources()
            ->search(
                $this->login()->dsid,
                $this->login()->token,
                $batchId
            );
    }

    /**
     * 获取报告问题的连接器实例
     *
     * @return ReportProblemConnector 返回一个ReportProblemConnector实例
     */
    public function getReportProblemConnector(): ReportProblemConnector
    {
        // 如果reportProblemConnector属性尚未初始化，则创建一个新的ReportProblemConnector实例并缓存
        return $this->reportProblemConnector ??= new ReportProblemConnector(
            $this->getAppleIdResource()->getWebResource()->getApple(),
            $this->getAppleIdResource()->getAuthenticator()
        );
    }

    /**
     * 获取AppleId资源实例
     *
     * @return AppleIdResource 返回一个AppleIdResource实例
     */
    public function getAppleIdResource(): AppleIdResource
    {
        // 返回绑定到当前实例的AppleIdResource实例
        return $this->appleIdResource;
    }

    /**
     * 执行登录操作
     *
     * @return Login 返回一个Login实例，包含登录相关信息
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function login(): Login
    {
        if ($this->login) {
            return $this->login;
        }

        //清除 cookie 信息
        $this->getAppleIdResource()
            ->getAuthenticator()
            ->getCookieJar()
            ->clearCookiesByName(['selfserv_toru', 'selfserv_tahi', 'dqsid', 'user-context']);


        // 如果login属性尚未初始化，则执行登录操作并缓存结果
        return $this->login = $this->getReportProblemConnector()->getResources()->login();
    }

    /**
     * 获取搜索集合
     *
     * @return Collection 返回一个Collection实例，包含搜索集合结果
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function searchCollection(): Collection
    {
        // 如果searchCollection属性尚未初始化，则执行搜索集合操作并缓存结果
        return $this->searchCollection ??= $this->getReportProblemConnector()
            ->getResources()
            ->searchCollection(
                $this->login()->dsid,
                $this->login()->token
            );
    }
}
