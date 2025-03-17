<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use Spatie\LaravelData\Data as BaseData;
use Saloon\Traits\Responses\HasResponse;
use Saloon\Contracts\DataObjects\WithResponse;

class Data extends BaseData implements WithResponse
{
    use HasResponse;

    public function isSuccess(): bool
    {
        return isset($this->status) && $this->status === 0;
    }
}
