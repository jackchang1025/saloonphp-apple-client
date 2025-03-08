<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Account;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class AccountValidate extends Data
{
    public function __construct(
        public array $account,
    ) {}
}
