<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\VerifyEmailSecurityCode;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SecurityCode extends Data
{
    public function __construct(
        public string $code,
    ) {}
}
