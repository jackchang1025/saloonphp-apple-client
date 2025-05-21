<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\SignIn;

use Spatie\LaravelData\Data;

class SignInComplete extends Data
{
    public function __construct(
        public string $account,
        public string $m1,
        public string $m2,
        public string $c,
        public bool $rememberMe = false,
    ) {}
}
