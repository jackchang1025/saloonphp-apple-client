<?php

namespace Modules\AppleClient\Events\Family;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\AppleClient\Service\Integrations\Icloud\Dto\Response\leaveFamily\leaveFamily;

class FamilyLeftEvent
{
    use Dispatchable;

    public function __construct(public leaveFamily $leaveFamily)
    {
    }
}
