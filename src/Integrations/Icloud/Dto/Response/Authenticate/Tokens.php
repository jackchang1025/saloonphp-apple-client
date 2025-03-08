<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Authenticate;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Tokens extends Data
{
    public function __construct(
        public string $mmeAuthToken,
    ) {
    }
}
