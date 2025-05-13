<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue as ProxySplQueueContract;

trait ProvidesProxySplQueue
{
    protected ?ProxySplQueueContract $proxySplQueue = null;


    public function proxySplQueue(): ?ProxySplQueueContract
    {
        return $this->proxySplQueue;
    }

    public function withProxySplQueue(ProxySplQueueContract $proxySplQueue): self
    {
        $this->proxySplQueue = $proxySplQueue;
        return $this;
    }
    
}