<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AuthTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class InitializeSessionResponse extends Data
{
    public function __construct(
        public string $pageUUID,
    ) {}
}
