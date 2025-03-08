<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Captcha;

use Spatie\LaravelData\Data;

class Payload extends Data
{
    public function __construct(
        public string $contentType,
        public string $content,
    ) {}
}