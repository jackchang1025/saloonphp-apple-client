<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\Authenticate;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Authenticate extends Data
{
    public function __construct(
        public int $protocolVersion,
        public ?AppleAccountInfo $appleAccountInfo = null,
        public ?Tokens $tokens = null,
        public ?string $title = null,
        public ?string $localizedError = null,
        public ?string $message = null
    ) {}

    public function isisVerification(): bool
    {
        return 'Verification Required' === $this->title;
    }
}
