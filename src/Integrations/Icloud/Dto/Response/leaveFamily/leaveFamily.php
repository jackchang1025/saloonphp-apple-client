<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\leaveFamily;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\MapName;

class leaveFamily extends Data
{
    public function __construct(
        #[MapName('status-message')]
        public string $statusMessage,
        public int $status,
        public ?string $title = null,
        public bool $isMemberOfFamily = false,
    ) {
    }
}
