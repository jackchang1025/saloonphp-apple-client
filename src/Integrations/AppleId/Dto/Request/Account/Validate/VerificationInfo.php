<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class VerificationInfo extends Data
{
    public function __construct(
        public string $id,
        public string $answer,
    ) {}
}