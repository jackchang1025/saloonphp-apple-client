<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class PersonName extends Data
{
    public function __construct(
        public string $firstName,
        public string $lastName,
    ) {}
}
