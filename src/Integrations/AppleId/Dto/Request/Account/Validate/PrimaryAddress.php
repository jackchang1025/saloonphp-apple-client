<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class PrimaryAddress extends Data
{
    public function __construct(
        public string $country,
    ) {}
}