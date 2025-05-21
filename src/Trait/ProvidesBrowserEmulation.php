<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpAppleClient\Browser\Browser;

trait ProvidesBrowserEmulation
{
    protected ?Browser $browser = null;

    public function browser(): ?Browser
    {
        return $this->browser;
    }

    public function withBrowser(Browser $browser): static
    {
        $this->browser = $browser;

        return $this;
    }
}
