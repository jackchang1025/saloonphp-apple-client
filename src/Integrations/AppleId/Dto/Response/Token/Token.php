<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Token;

use Illuminate\Support\Carbon;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Token extends Data
{

    public function __construct(public bool $hasToken = false, public ?Carbon $updateAt = null)
    {
        if ($this->updateAt === null) {
            $this->updateAt = now();
        }
    }
}
