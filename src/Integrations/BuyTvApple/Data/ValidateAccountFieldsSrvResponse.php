<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ValidateAccountFieldsSrvResponse extends Data
{
    public function __construct(
        public array $validationResults,
        public int $status,
        public string $pageUUID,
    ) {
    }
}