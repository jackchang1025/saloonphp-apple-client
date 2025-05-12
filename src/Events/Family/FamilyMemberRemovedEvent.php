<?php

namespace Modules\AppleClient\Events\Family;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\AppleClient\Service\Integrations\Icloud\Dto\Response\FamilyInfo\FamilyInfo;

class FamilyMemberRemovedEvent
{
    use Dispatchable;

    public function __construct(public FamilyInfo $familyInfo)
    {
    }
}
