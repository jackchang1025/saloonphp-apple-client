<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ValidateEmailConfirmationCodeSrvResponse extends Data
{
    public function __construct(
        public string $pageUUID,
        public int $status,
        public string $clientToken,
    ) {
    }
}