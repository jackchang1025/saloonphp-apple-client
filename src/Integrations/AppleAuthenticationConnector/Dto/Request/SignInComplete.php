<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Request;

use Spatie\LaravelData\Data;

class SignInComplete extends Data
{
    public function __construct(
        public string $key,
        public string $b,
        public string $salt,
        public string $c,
        public string $password,
        public string $iteration = '20221',
        public string $protocol = 's2k',
    ) {}
}
