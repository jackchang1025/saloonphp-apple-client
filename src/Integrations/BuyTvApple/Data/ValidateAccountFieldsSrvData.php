<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ValidateAccountFieldsSrvData extends Data
{
    public function __construct(
        public string $email,
        public string $acAccountName,
        public string $acAccountPassword,
        public string $pageUUID,
        public string $storefront = 'USA',
        public string $context = 'create',
        public string|int $marketing = 1,
        public string $restrictedAccountType = 'restrictedEmailOptimizedWeb',
        public string $addressOfficialCountryCode = 'USA',
        public string $paymentMethodType = 'None',
        public string $accountType = 'email',
        
    ) {}
}
