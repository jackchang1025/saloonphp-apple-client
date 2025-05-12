<?php

namespace Modules\AppleClient\Events\Family;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\AppleClient\Service\Integrations\Icloud\Dto\Response\FamilyInfo\FamilyInfo;

class FamilyMemberAddedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public FamilyInfo $familyInfo)
    {
    }
}
