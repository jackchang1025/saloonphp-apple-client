<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient;

use App\Services\Resource\AppleIdBatchRegistrationForIcloud;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;
use \InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Saloon\Traits\RequestProperties\HasConfig;
use Saloon\Traits\RequestProperties\HasMiddleware;
use Weijiajia\HttpProxyManager\Exception\ProxyModelNotFoundException;
use Weijiajia\HttpProxyManager\ProxyManager;
use Weijiajia\IpAddress\IpAddressManager;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleIdInterface;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\SaloonphpAppleClient\Resource\AppleId\AppleIdResource;

/**
 * Apple 服务类
 *
 * 提供与 Apple API 交互的核心功能
 * 使用工厂模式和策略模式管理各种连接器
 */
class Apple
{
    use Macroable;
    use HasConfig;
    use Conditionable;
    use HasMiddleware;
    // 服务属性
    protected ?LoggerInterface $logger = null;
    protected ?ProxySplQueue $proxySplQueue = null;
    protected ?HeaderSynchronizeDriver $headerSynchronizeDriver = null;
    protected bool $debug = true;
    protected ?Country $country = null;

    // 资源属性
    private ?CookieJar $cookieJar = null;

    private ?Browser $browser = null;
    
    /**
     * 构造函数
     *
     * @param AppleIdInterface $appleId Apple ID 接口实现
     * @param IpAddressManager $ipAddressManager IP 地址管理器
     * @param ProxyManager $proxyManager 代理管理器
     * @param Dispatcher|null $dispatcher 事件分发器
     */
    public function __construct(
        protected AppleIdInterface $appleId
    ) {
    }

    /**
     * 设置国家/地区
     *
     * @param Country $country 国家/地区代码
     * @return static
     */
    public function withCountry(Country $country): static
    {
        $this->country = $country;
        return $this;
    }

    /**
     * 获取国家/地区
     *
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * 获取浏览器实例
     *
     * @return Browser
     * @throws ProxyModelNotFoundException
     */
    public function browser(): Browser
    {
        return $this->browser??= new Browser();
    }

    /**
     * 设置日志记录器
     *
     * @param LoggerInterface $logger 日志记录器
     * @return static
     */
    public function withLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * 获取日志记录器
     *
     * @return LoggerInterface|null 日志记录器
     */
    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }

    /**
     * 设置请求头同步驱动
     *
     * @param HeaderSynchronizeDriver $headerSynchronizeDriver 请求头同步驱动
     * @return static
     */
    public function withHeaderSynchronizeDriver(HeaderSynchronizeDriver $headerSynchronizeDriver): static
    {
        $this->headerSynchronizeDriver = $headerSynchronizeDriver;
        return $this;
    }

    /**
     * 获取 Cookie 容器
     *
     * @return CookieJar
     */
    public function getCookieJar(): CookieJar
    {
        return $this->cookieJar ??= new CookieJar();
    }

    /**
     * 获取 Apple ID 接口
     *
     * @return AppleIdInterface
     */
    public function getAppleId(): AppleIdInterface
    {
        return $this->appleId;
    }

    /**
     * 获取代理队列
     *
     * @return ProxySplQueue
     * @throws InvalidArgumentException|\Weijiajia\HttpProxyManager\Exception\ProxyModelNotFoundException 当代理无效时
     */
    public function getProxySplQueue(): ProxySplQueue
    {
        return $this->proxySplQueue;
    }

    /**
     * 获取请求头同步驱动
     *
     * @return HeaderSynchronizeDriver
     */
    public function getHeaderSynchronizeDriver(): HeaderSynchronizeDriver
    {
        return $this->headerSynchronizeDriver ??= new ArrayStoreHeaderSynchronize();
    }

    /**
     * 设置 Cookie 容器
     *
     * @param CookieJar $cookieJar Cookie 容器
     * @return static
     */
    public function withCookieJar(CookieJar $cookieJar): static
    {
        $this->cookieJar = $cookieJar;
        return $this;
    }

    /**
     * 设置调试模式
     *
     * @param bool $debug 是否启用调试
     * @return static
     */
    public function withDebug(bool $debug): static
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * 设置代理队列
     *
     * @param ProxySplQueue $proxySplQueue 代理队列
     * @return static
     */
    public function withProxySplQueue(ProxySplQueue $proxySplQueue): static
    {
        $this->proxySplQueue = $proxySplQueue;
        return $this;
    }


    /**
     * 设置配置项
     *
     * @param mixed $key 配置键
     * @param mixed $value 配置值
     * @return static
     */
    public function withConfig(mixed $key, mixed $value): static
    {
        $this->config()->add($key, $value);
        return $this;
    }

    /**
     * 默认配置
     *
     * @return array<string, mixed>
     */
    protected function defaultConfig(): array
    {
        return [
            'serviceKey'  => 'af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3',
            'redirectUri' => 'https://account.apple.com',
            'web_icloud_base_url' => 'https://www.icloud.com/',
        ];
    }

    /**
     * 获取调试状态
     *
     * @return bool
     */
    public function debug(): bool
    {
        return $this->debug;
    }

    /**
     * 获取 AppleIdBatchRegistrationForIcloud 实例
     *
     * @return AppleIdBatchRegistrationForIcloud
     */
    public function appleIdBatchRegistrationForIcloud(): AppleIdBatchRegistrationForIcloud
    {
        return new AppleIdBatchRegistrationForIcloud($this);
    }

    public function appleIdResource(): AppleIdResource
    {
        return new AppleIdResource($this);
    }
}
