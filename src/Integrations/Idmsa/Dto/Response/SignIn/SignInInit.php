<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn;

use Spatie\LaravelData\Data;

class SignInInit extends Data
{
    public function __construct(
        public string $salt,
        public string $b,
        public string $c,
        public int|string $iteration,
        public string $protocol
    ) {}
}
