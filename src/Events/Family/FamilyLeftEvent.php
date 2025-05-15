<?php

namespace Weijiajia\SaloonphpAppleClient\Events\Family;


use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\leaveFamily\leaveFamily;

class FamilyLeftEvent
{

    public function __construct(public leaveFamily $leaveFamily)
    {
    }
}
