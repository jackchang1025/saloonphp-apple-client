<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response;

use Spatie\LaravelData\Data;

class SignInComplete extends Data
{

    public function __construct(
        public string $M1,
        public string $M2,
        public string $c,
    ) {
    }

}
