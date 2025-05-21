<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations;

class BaseResource
{
    public function __construct(protected AppleConnector $connector) {}

    public function getConnector(): AppleConnector
    {
        return $this->connector;
    }
}
