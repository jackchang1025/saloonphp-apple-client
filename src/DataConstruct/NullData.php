<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use Illuminate\Support\Carbon;

class NullData extends Data
{
    public function __construct(public ?Carbon $updateAt = null)
    {
        if ($this->updateAt === null) {
            $this->updateAt = now();
        }
    }
}
