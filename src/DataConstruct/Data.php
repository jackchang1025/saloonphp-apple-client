<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;
use Spatie\LaravelData\Data as BaseData;

class Data extends BaseData implements WithResponse
{
    use HasResponse;

    public function isSuccess(): bool
    {
        return isset($this->status) && 0 === $this->status;
    }
}
