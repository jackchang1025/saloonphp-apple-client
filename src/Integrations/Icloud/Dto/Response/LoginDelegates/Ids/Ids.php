<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\Ids;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;
use Spatie\LaravelData\Attributes\MapName;

#[MapName(CustomSnakeCaseMapper::class)]
class Ids extends Data
{
    public function __construct(
        public int $status,
        public ServiceData $serviceData,
        public ?Alert $alert = null,
        public ?string $message = null,
        public bool $accountExists = false
    ) {
    }
}
