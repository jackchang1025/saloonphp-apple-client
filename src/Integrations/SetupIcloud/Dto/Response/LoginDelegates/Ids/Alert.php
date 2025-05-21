<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\Ids;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Alert extends Data
{
    public function __construct(
        string $title,
        string $body,
        string $button
    ) {}
}
