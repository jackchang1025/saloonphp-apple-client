<?php

namespace Weijiajia\SaloonphpAppleClient\Contracts;

use GuzzleHttp\Cookie\CookieJarInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Saloon\Contracts\ArrayStore;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Country;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;

interface ConfigurableAppleId
{
    /**
     * Set or replace the CookieJar instance.
     */
    public function withCookieJar(CookieJarInterface $cookieJar): static;

    /**
     * Set or replace the LoggerInterface instance.
     */
    public function withLogger(LoggerInterface $logger): static;

    /**
     * Set or replace the HeaderSynchronizeDriver instance.
     */
    public function withHeaderSynchronizeDriver(HeaderSynchronizeDriver $headerSynchronizeDriver): static;

    /**
     * Set or replace the ProxySplQueue instance.
     */
    public function withProxySplQueue(ProxySplQueue $proxySplQueue): static; // 注意这里用的是具体的类，保持和 Trait 一致

    /**
     * Set or replace the Browser instance.
     */
    public function withBrowser(Browser $browser): static;

    /**
     * Set or replace the Country instance.
     */
    public function withCountry(Country|string $country): static; // 保持和 Trait 一致

    /**
     * Set or replace the EventDispatcherInterface instance.
     */
    public function withDispatcher(?EventDispatcherInterface $eventDispatcher): static; // 允许 null

    /**
     * Add or replace a specific Saloon configuration value.
     */
    public function config(): ArrayStore;
}
