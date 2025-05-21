<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\leaveFamily;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class leaveFamily extends Data
{
    public function __construct(
        #[MapName('status-message')]
        public string $statusMessage,
        public int $status,
        public ?string $title = null,
        public bool $isMemberOfFamily = false,
    ) {}
}
