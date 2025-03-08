<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Account extends Data
{
    public function __construct(
        public string $name,
        public array $person,
    ) {}
}