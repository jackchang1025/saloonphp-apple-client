<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient;

use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;
use Psr\Log\LoggerInterface;
use Saloon\Traits\RequestProperties\HasConfig;
use Saloon\Traits\RequestProperties\HasMiddleware;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId as AppleIdContract;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\SaloonphpAppleClient\Resource\AppleId\AppleIdResource;
use Weijiajia\SaloonphpAppleClient\Resource\Icloud\IcloudResource;
use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\Helpers\GeneratePassword;
use Weijiajia\SaloonphpAppleClient\Contracts\Phone;
use Weijiajia\SaloonphpAppleClient\Resource\Account\AccountResource;
use Psr\EventDispatcher\EventDispatcherInterface;

class AppleId implements AppleIdContract
{
    use Macroable;
    use HasConfig;
    use Conditionable;
    use HasMiddleware;

    protected ?ProxySplQueue $proxySplQueue = null;
    
    protected ?HeaderSynchronizeDriver $headerSynchronizeDriver = null;
    
    protected ?CookieJar $cookieJar = null;

    protected Collection $trustedPhoneNumbers;

    protected ?EventDispatcherInterface $dispatcher = null;

    protected bool $debug = true;

    
    /**
     * 构造函数
     *    
     * @param string $appleId Apple ID 接口实现
     * @param Browser|null $browser 浏览器实例
     * @param string|null $password 密码
     * @param Country|null $country 国家/地区
     * @param LoggerInterface|null $logger 日志记录器
     * @param Collection|array $trustedPhoneNumbers 可信电话号码列表
     */
    public function __construct(
        protected string $appleId,
        protected ?string $password = null,
        protected ?Browser $browser = null,
        protected ?Country $country = null,
        protected ?LoggerInterface $logger = null,
        Collection|array $trustedPhoneNumbers = [],
    ) {
        $this->trustedPhoneNumbers = is_array($trustedPhoneNumbers) ? collect($trustedPhoneNumbers) : $trustedPhoneNumbers;
    }

    public function appleId(): string
    {
        return $this->appleId;
    }

    public function withDispatcher(EventDispatcherInterface $dispatcher): static
    {
        $this->dispatcher = $dispatcher;
        return $this;
    }

    public function dispatcher(): ?EventDispatcherInterface
    {
        return $this->dispatcher;
    }

    /**
     * @return string
     * @throws \Random\RandomException
     */
    public function password(): string
    {
        return $this->password ??= GeneratePassword::generatePassword();
    }

    /**
     * 获取国家/地区
     *
     * @return Country|null
     */
    public function country(): ?Country
    {
        return $this->country;
    }

    public function withCountry(Country $country): static
    {
        $this->country = $country;
        return $this;
    }

    /**
     * 获取浏览器实例
     *
     * @return Browser
     */
    public function browser(): Browser
    {
        return $this->browser ??= new Browser();
    }

    public function withBrowser(Browser $browser): static
    {
        $this->browser = $browser;
        return $this;
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
    public function logger(): ?LoggerInterface
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
    public function cookieJar(): CookieJar
    {
        return $this->cookieJar ??= new CookieJar();
    }

    /**
     * 获取代理队列
     *
     * @return ProxySplQueue|null
     */
    public function proxySplQueue(): ?ProxySplQueue
    {
        return $this->proxySplQueue;
    }

    /**
     * 获取请求头同步驱动
     *
     * @return HeaderSynchronizeDriver
     */
    public function headerSynchronizeDriver(): HeaderSynchronizeDriver
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
     * @return IcloudResource
     */
    public function icloudResource(): IcloudResource
    {
        return new IcloudResource($this);
    }

    public function appleIdResource(): AppleIdResource
    {
        return new AppleIdResource($this);
    }

    public function accountResource(): AccountResource
    {
        return new AccountResource($this);
    }

    public function trustedPhoneNumbers(): Collection{

        return $this->trustedPhoneNumbers;
    }

    public function addTrustedPhoneNumber(Phone $phone): self{

        $this->trustedPhoneNumbers->push($phone);

        return $this;
    }

    public function removeTrustedPhoneNumber(Phone $phone): self{
        
        $this->trustedPhoneNumbers->forget($phone);

        return $this;
    }

    public function hasTrustedPhoneNumber(Phone $phone): bool{

        return $this->trustedPhoneNumbers->contains($phone);
    }

    public function securityCode(): string
    {
        throw new \RuntimeException('Not implemented');
    }

}
