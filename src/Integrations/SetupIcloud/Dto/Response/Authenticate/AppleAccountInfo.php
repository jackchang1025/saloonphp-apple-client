<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Authenticate;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class AppleAccountInfo extends Data
{
    public function __construct(
        public string $dsid,
        public int $dsPrsID,
    ) {
    }
}
