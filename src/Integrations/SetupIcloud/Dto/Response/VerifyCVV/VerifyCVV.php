<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\VerifyCVV;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class VerifyCVV extends Data
{
    public function __construct(
        #[MapName('status-message')]
        public string $statusMessage,
        public int $status,
        public ?string $title = null,
        public ?string $verificationToken = null,
    ) {}
}
