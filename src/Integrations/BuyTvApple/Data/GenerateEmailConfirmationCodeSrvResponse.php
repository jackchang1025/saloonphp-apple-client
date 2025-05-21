<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class GenerateEmailConfirmationCodeSrvResponse extends Data
{
    public function __construct(
        public string $clientToken,
        public int $status,
    ) {}
}
