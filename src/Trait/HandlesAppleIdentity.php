<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

trait HandlesAppleIdentity
{
    public function appleId(): string
    {
        return $this->appleId;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function getSessionId(): string
    {
        return md5($this->appleId());
    }

    public function securityCode(): string
    {
        // Default implementation or throw exception if not specifically handled
        // by the class using the Trait.
        throw new \LogicException('Security code handling is not implemented by default in ProvidesAppleIdCapabilities.');
    }
}
