<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId as AppleIdContract;
use Weijiajia\SaloonphpAppleClient\Trait\ProvidesAppleIdCapabilities;

class AppleId implements AppleIdContract
{
    use ProvidesAppleIdCapabilities;

    public function __construct(
        protected string $appleId,
        protected ?string $password = null,
    ) {}
}
