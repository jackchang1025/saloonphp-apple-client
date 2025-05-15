<?php

namespace Weijiajia\SaloonphpAppleClient\Events\Family;


use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyInfo\FamilyInfo;

class FamilyCreatedEvent
{

    public function __construct(public FamilyInfo $familyInfo)
    {
    }
}
