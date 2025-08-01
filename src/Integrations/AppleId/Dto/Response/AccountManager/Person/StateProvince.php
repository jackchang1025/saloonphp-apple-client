<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class StateProvince extends Data
{
    public function __construct(
        public ?string $code = null,
        public ?string $name = null,
    ) {}
}
