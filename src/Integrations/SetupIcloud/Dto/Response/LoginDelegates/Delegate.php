<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\GameCenter\GameCenter;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\Ids\Ids;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\MobileMe\MobileMe;

class Delegate extends Data
{
    public function __construct(
        #[MapName('com.apple.mobileme')]
        public ?MobileMe $mobileMeService = null,
        #[MapName('com.apple.gamecenter')]
        public ?GameCenter $gameCenterService = null,
        #[MapName('com.apple.private.ids')]
        public ?Ids $idsService = null,
        public int $status = 0,
    ) {}
}
