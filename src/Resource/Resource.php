<?php

namespace Weijiajia\SaloonphpAppleClient\Resource;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;

abstract class Resource
{
    public function __construct(protected AppleId $appleId) {}

    public function appleId(): AppleId
    {
        return $this->appleId;
    }
}
