<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Psr\Log\LoggerInterface;

trait ProvidesLogger
{
    protected ?LoggerInterface $logger = null;

    public function logger(): ?LoggerInterface
    {
        return $this->logger;
    }

    public function withLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;

        return $this;
    }
}
