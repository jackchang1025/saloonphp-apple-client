<?php

namespace Weijiajia\SaloonphpAppleClient\Contracts;

use GuzzleHttp\Cookie\CookieJarInterface;
use Illuminate\Support\Collection;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Saloon\Contracts\ArrayStore as ArrayStoreContract;
use Saloon\Helpers\MiddlewarePipeline;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Country;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;

interface AppleId extends ConfigurableAppleId
{
    public function appleId(): string;

    public function password(): string;

    public function trustedPhoneNumbers(): Collection;

    public function addTrustedPhoneNumber(Phone $phone): static;

    public function removeTrustedPhoneNumber(Phone $phone): static;

    public function hasTrustedPhoneNumber(Phone $phone): bool;

    public function securityCode(): string;

    public function country(): ?Country;

    public function browser(): Browser;

    public function logger(): ?LoggerInterface;

    public function proxySplQueue(): ?ProxySplQueue;

    public function headerSynchronizeDriver(): HeaderSynchronizeDriver;

    public function cookieJar(): ?CookieJarInterface;

    public function debug(): bool;

    public function middleware(): MiddlewarePipeline;

    public function config(): ArrayStoreContract;

    public function dispatcher(): ?EventDispatcherInterface;
}
