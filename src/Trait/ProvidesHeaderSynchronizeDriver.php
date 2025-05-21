<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

trait ProvidesHeaderSynchronizeDriver
{
    protected ?HeaderSynchronizeDriver $headerSynchronizeDriver = null;

    public function headerSynchronizeDriver(): HeaderSynchronizeDriver
    {
        return $this->headerSynchronizeDriver ??= new ArrayStoreHeaderSynchronize();
    }

    public function withHeaderSynchronizeDriver(HeaderSynchronizeDriver $headerSynchronizeDriver): static
    {
        $this->headerSynchronizeDriver = $headerSynchronizeDriver;

        return $this;
    }
}
