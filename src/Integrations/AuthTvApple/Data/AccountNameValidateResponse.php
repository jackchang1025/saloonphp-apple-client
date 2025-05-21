<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class AccountNameValidateResponse extends Data
{
    public function __construct(
        public bool $accountNameAvailable,
        public bool $email,
        public string $pageUUID,
    ) {}
}
