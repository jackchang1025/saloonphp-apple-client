<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Events;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;

class VerifySecurityCodeFailedEvent
{
    public function __construct(
        public AppleId $appleId,
        public \Throwable $throwable
    ) {}
}
