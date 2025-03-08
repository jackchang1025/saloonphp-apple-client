<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\Ids;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapName;

#[MapName(CustomSnakeCaseMapper::class)]
class Handles extends Data
{
    public function __construct(
        public int $status,
        public bool $isUserVisible,
        public string $uri
    ) {
    }
}
