<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\MobileMe;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ServiceData extends Data
{
    public function __construct(
        public string $protocolVersion,
        public Token $tokens
    ) {}
}
