<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\GameCenter;


use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapName;

#[MapName(CustomSnakeCaseMapper::class)]
class Service extends Data
{
    public function __construct(
        public string $allowContactLookup,
        #[MapName('lastName')]
        public string $lastName,
        public int $lastUpdated,
        public string $alias,
        public string $authToken,
        public string $playerId,
        public string $dsid,
        #[MapName('firstName')]
        public string $firstName,
        public string $env,
        public string $appleId,
    ) {

    }
}
