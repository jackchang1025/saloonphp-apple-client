<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use Spatie\LaravelData\Data as BaseData;

class Data extends BaseData
{

    public function isSuccess(): bool
    {
        return isset($this->status) && $this->status === 0;
    }
}
