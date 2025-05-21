<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\GameCenter;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class GameCenter extends Data
{
    public function __construct(
        public int $status,
        public ?string $message = null,
        public ?Service $serviceData = null,
        public bool $accountExists = false,
    ) {}
}
