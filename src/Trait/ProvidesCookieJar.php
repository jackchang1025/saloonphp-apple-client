<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\CookieJarInterface;

trait ProvidesCookieJar
{
    protected ?CookieJarInterface $cookieJar = null;

    public function cookieJar(): CookieJarInterface
    {
        return $this->cookieJar ??= new CookieJar();
    }

    public function withCookieJar(CookieJarInterface $cookieJar): static
    {
        $this->cookieJar = $cookieJar;

        return $this;
    }
}
