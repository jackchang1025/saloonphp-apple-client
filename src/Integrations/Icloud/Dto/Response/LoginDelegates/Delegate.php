<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\GameCenter\GameCenter;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\Ids\Ids;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\MobileMe\MobileMe;
use Spatie\LaravelData\Attributes\MapName;

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
    ) {
    }
}
