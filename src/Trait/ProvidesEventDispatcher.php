<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Psr\EventDispatcher\EventDispatcherInterface;

trait ProvidesEventDispatcher
{
    protected ?EventDispatcherInterface $eventDispatcher = null;

    public function dispatcher(): ?EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    public function withDispatcher(EventDispatcherInterface $eventDispatcher): static
    {
        $this->eventDispatcher = $eventDispatcher;
        return $this;
    }
}