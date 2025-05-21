<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class CreateAccountSrvData extends Data
{
    // storefront: USA
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
    // pageUUID: pG0Hg4YqDoNlZydUVkj2hu5NxoE=
    // agreedToTerms: 1
    // accountType: email
    // email: DeborahWhitep8uzz@gmail.com
    // secretCode: 340817
    // clientToken: 001294-00-2356c9eed13c3fe01e11cdfe89d62b55b30c38924233ca3c763fc8224b7843dfLTOW
    // webCreate: true
    public function __construct(
        public string $firstName,
        public string $lastName,
        public int $birthMonth,
        public int $birthDay,
        public int $birthYear,
        public string $acAccountName,
        public string $acAccountPassword,
        public string $pageUUID,
        public string $email,
        public string $secretCode,
        public string $clientToken,
        public bool $webCreate = true,
        public int $marketing = 1,
        public string $restrictedAccountType = 'restrictedEmailOptimizedWeb',
        public string $addressOfficialCountryCode = 'USA',
        public string $paymentMethodType = 'None',
        public int $agreedToTerms = 1,
        public string $accountType = 'email',
        public string $storefront = 'USA',
        public string $context = 'create',
    ) {}
}
