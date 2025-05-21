<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person\ReachableAtOptions;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ContactInformationOptions extends Data
{
    public function __construct(
        public array $options = [],
    ) {}
}
