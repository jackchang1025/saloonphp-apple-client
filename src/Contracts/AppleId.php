<?php

namespace Weijiajia\SaloonphpAppleClient\Contracts;
use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\Country;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Cookie\CookieJar;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Saloon\Helpers\MiddlewarePipeline;
use Saloon\Contracts\ArrayStore as ArrayStoreContract;

interface AppleId
{
    public function appleId(): string;

    public function password(): string;

    public function trustedPhoneNumbers(): Collection;

    public function addTrustedPhoneNumber(Phone $phone): self;

    public function removeTrustedPhoneNumber(Phone $phone): self;

    public function hasTrustedPhoneNumber(Phone $phone): bool;

    public function securityCode(): string;

    public function country(): ?Country;

    public function browser(): Browser;

    public function logger(): ?LoggerInterface;

    public function proxySplQueue(): ?ProxySplQueue;

    public function headerSynchronizeDriver(): HeaderSynchronizeDriver;

    public function cookieJar(): CookieJar;

    public function debug(): bool;

    public function middleware(): MiddlewarePipeline;

    public function config(): ArrayStoreContract;
    
}