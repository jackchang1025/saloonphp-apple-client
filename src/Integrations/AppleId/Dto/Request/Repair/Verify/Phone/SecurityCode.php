<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Verify\Phone;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SecurityCode extends Data
{
    // {
    //     "phoneNumberVerification": {
    //         "phoneNumber": {
    //             "number": "(470) 752-2811",
    //             "type": "Approver",
    //             "id": 20101,
    //             "countryCode": "US"
    //         },
    //         "mode": "sms",
    //         "securityCode": {
    //             "code": "354721"
    //         }
    //     },
    //     "completedSteps": [
    //         "phoneNumber"
    //     ],
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
        public array $completedSteps = ['phoneNumber'],
        public array $requiredSteps = ['phoneNumber', 'phoneNumberVerification', 'privacyConsent'],
        public array $repairContext = ['repairType' => 'restricted_account_conversion', 'repairItems' => ['phoneNumber', 'privacyConsent']],
    ) {}
}
