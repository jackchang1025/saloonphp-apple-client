<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\Ids;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class Ids extends Data
{
    public function __construct(
        public int $status,
        public ServiceData $serviceData,
        public ?Alert $alert = null,
        public ?string $message = null,
        public bool $accountExists = false
    ) {}
}
