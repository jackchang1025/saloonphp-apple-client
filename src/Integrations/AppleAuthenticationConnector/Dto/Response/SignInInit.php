<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response;

use Spatie\LaravelData\Data;

class SignInInit extends Data
{

    public function __construct(public string $key, public string $value)
    {
    }
}
