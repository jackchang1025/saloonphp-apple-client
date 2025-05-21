<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment;

use Spatie\LaravelData\Data;

class NameOnCard extends Data
{
    public function __construct(
        public string $firstName,
        public string $lastName,
    ) {}
}
