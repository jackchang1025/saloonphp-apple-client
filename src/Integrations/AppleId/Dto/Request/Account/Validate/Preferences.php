<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class Preferences extends Data
{
    public function __construct(
        public string $preferredLanguage,
        public MarketingPreferences $marketingPreferences,
    ) {}
}
