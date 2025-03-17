<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ValidateAccountFieldsSrvData extends Data
{
    //storefront: USA
// context: create
// firstName: Jack
// lastName: Chang
// birthMonth: 10
// birthDay: 25
// birthYear: 1996
// acAccountName: DeborahWhitep8uzz@gmail.com
// acAccountPassword: *7@e@rljDlC,)p*-u$vi
// marketing: 1
// restrictedAccountType: restrictedEmailOptimizedWeb
// addressOfficialCountryCode: USA
// paymentMethodType: None
// pageUUID: o2a+kdfx25UoZb2hf+I42t8E5S8=
// agreedToTerms: 1
// accountType: email
// email: DeborahWhitep8uzz@gmail.com
    public function __construct(
        public string $email,
        public string $acAccountName,
        public string $firstName,
        public string $lastName,
        public int $birthMonth,
        public int $birthDay,
        public int $birthYear,
        public string $acAccountPassword,
        public string $pageUUID,
        public string $storefront = 'USA',
        public string $context = 'create',
        public string|int $marketing = 1,
        public string $restrictedAccountType = 'restrictedEmailOptimizedWeb',
        public string $addressOfficialCountryCode = 'USA',
        public string $paymentMethodType = 'None',
        public string $accountType = 'email',
        public int $agreedToTerms = 1,
        
    ) {}
}
