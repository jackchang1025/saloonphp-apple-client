<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\VerifyCVV;

use Spatie\LaravelData\Data;

class VerifyCVV extends Data
{
    public function __construct(
        public string $securityCode,
        public string $creditCardId,
        public string $verificationType,
        public ?string $creditCardLastFourDigits = null,
        public ?string $partnerLogin = null,
        public ?string $smsSessionID = null,
        public string $billingType = 'Card',
    ) {
    }
}
