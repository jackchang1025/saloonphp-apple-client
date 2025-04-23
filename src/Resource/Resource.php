<?php

namespace Weijiajia\SaloonphpAppleClient\Resource;

use Weijiajia\SaloonphpAppleClient\Apple;

abstract class Resource
{
    public function __construct(protected Apple $apple)
    {
    }

    public function apple(): Apple
    {
        return $this->apple;
    }
    
    
}
