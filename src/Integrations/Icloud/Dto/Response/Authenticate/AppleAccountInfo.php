<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Authenticate;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class AppleAccountInfo extends Data
{
    public function __construct(
        public string $dsid,
        public int $dsPrsID,
    ) {
    }
}
