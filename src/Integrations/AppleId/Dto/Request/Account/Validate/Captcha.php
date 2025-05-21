<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class Captcha extends Data
{
    public function __construct(
        public int $id,
        public string $token,
        public string $answer,
    ) {}
}
