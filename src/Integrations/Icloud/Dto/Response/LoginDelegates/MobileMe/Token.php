<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\MobileMe;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Token extends Data
{
    public function __construct(
        public string $mmeFMFAppToken,
        public string $mapsToken,
        public string $mmeFMIPToken,
        public string $cloudKitToken,
        public string $mmeAuthToken,
        public string $mmeFMFToken,
    ) {
    }
}
