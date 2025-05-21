<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class StateProvince extends Data
{
    public function __construct(
        public string $code,
        public string $name
    ) {}
}
