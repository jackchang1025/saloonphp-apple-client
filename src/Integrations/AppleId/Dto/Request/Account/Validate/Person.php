<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class Person extends Data
{
    public function __construct(
        public PersonName $name,
        public string $birthday,
        public PrimaryAddress $primaryAddress,
    ) {}
}
