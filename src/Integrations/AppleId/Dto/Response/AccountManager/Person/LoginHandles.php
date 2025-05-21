<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class LoginHandles extends Data
{
    public function __construct(
        public array $phoneLoginHandles = [],
        public array $emailLoginHandles = [],
    ) {}
}
