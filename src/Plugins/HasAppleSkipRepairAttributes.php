<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasAppleSkipRepairAttributes
{
    public function hasAppleSkipRepairAttributes(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('X-Apple-Skip-Repair-Attributes', '[]');
    }
}
