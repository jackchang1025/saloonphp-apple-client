<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Verify;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Phone extends Data
{
    // {
    //     "phoneNumberVerification": {
    //         "phoneNumber": {
    //             "number": "(470) 752-2811",
    //             "type": "Approver",
    //             "countryCode": "US"
    //         },
    //         "mode": "sms"
    //     },
    //     "completedSteps": [],
    //     "requiredSteps": [
    //         "phoneNumber",
    //         "phoneNumberVerification",
    //         "privacyConsent"
    //     ],
    //     "repairContext": {
    //         "repairType": "restricted_account_conversion",
    //         "repairItems": [
    //             "phoneNumber",
    //             "privacyConsent"
    //         ]
    //     }
    // }
    public function __construct(
        public array $phoneNumberVerification,
        public array $completedSteps = [],
        public array $requiredSteps = ['phoneNumber', 'phoneNumberVerification', 'privacyConsent'],
        public array $repairContext = ['repairType' => 'restricted_account_conversion', 'repairItems' => ['phoneNumber', 'privacyConsent']],
    ) {}
}
