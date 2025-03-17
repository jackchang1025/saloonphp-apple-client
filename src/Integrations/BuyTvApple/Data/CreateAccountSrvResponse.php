<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class CreateAccountSrvResponse extends Data
{
    public function __construct(
        public string $status,
    ) {
    }
}