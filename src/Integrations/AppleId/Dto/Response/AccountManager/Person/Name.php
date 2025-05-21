<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Name extends Data
{
    public function __construct(
        public bool $middleNameRequired = false,
        public ?string $firstName = null,
        public ?string $lastName = null,
    ) {}
}
