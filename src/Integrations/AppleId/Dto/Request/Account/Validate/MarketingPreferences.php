<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class MarketingPreferences extends Data
{
    public function __construct(
        public bool $appleNews,
        public bool $appleUpdates,
        public bool $iTunesUpdates,
    ) {}
}