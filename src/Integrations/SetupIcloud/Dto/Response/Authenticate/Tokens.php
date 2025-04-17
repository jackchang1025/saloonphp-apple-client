<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Authenticate;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Tokens extends Data
{
    public function __construct(
        public string $mmeAuthToken,
    ) {
    }
}
