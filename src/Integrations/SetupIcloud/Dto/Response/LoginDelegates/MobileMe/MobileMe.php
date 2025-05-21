<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\MobileMe;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class MobileMe extends Data
{
    public function __construct(
        public int $status,
        public ?string $statusMessage = null,
        public ?string $statusError = null,
        public ?ServiceData $serviceData = null
    ) {}
}
