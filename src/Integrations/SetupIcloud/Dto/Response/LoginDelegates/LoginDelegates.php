<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;

#[MapName(CustomSnakeCaseMapper::class)]
class LoginDelegates extends Data
{
    public function __construct(
        public int $status,
        public ?string $dsid = null,
        public ?Delegate $delegates = null,
        public ?string $statusMessage = null,
    ) {}
}
