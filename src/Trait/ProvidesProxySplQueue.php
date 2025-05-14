<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;

trait ProvidesProxySplQueue
{
    protected ?ProxySplQueue $proxySplQueue = null;


    public function proxySplQueue(): ?ProxySplQueue
    {
        return $this->proxySplQueue;
    }

    public function withProxySplQueue(ProxySplQueue $proxySplQueue): static
    {
        $this->proxySplQueue = $proxySplQueue;
        return $this;
    }
    
}