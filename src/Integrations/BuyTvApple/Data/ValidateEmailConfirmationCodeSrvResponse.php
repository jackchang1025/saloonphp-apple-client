<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ValidateEmailConfirmationCodeSrvResponse extends Data
{
    public function __construct(
        public int $status,
        public ?string $pageUUID = null,
        public ?string $clientToken = null,
    ) {
    }
}