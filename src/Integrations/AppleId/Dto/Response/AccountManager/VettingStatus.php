<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class VettingStatus extends Data
{
    public function __construct(
        public string $type,
        public bool $vetted,
        public bool $notVetted,
        public bool $pending,
    ) {
    }
}
