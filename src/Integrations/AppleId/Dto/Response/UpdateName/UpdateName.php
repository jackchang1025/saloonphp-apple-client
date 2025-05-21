<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\UpdateName;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class UpdateName extends Data
{
    public function __construct(
        public string $firstName,
        public string $middleName,
        public string $lastName
    ) {}
}
