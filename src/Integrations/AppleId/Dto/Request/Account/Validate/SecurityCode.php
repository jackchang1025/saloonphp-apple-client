<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SecurityCode extends Data
{
    public function __construct(
        public string $code,
    ) {}
}
