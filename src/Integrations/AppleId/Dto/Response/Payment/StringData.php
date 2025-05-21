<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class StringData extends Data
{
    public function __construct(
        public string $value
    ) {}
}
