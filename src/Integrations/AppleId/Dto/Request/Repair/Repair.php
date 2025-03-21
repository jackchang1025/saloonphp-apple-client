<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Repair extends Data
{
    // {
    //     "privacyConsentAccepted": true,
    //     "phoneNumberVerification": {
    //         "phoneNumber": {
    //             "number": "(470) 752-2811",
    //             "type": "Approver",
    //             "id": 20101,
    //             "countryCode": "US"
    //         }
    //     },
    //     "completedSteps": [
    //         "phoneNumber",
    //         "phoneNumberVerification"
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
        public bool $privacyConsentAccepted = true,
        public array $completedSteps = ['phoneNumber', 'phoneNumberVerification'],
        public array $requiredSteps = ['phoneNumber', 'phoneNumberVerification', 'privacyConsent'],
        public array $repairContext = ['repairType' => 'restricted_account_conversion', 'repairItems' => ['phoneNumber', 'privacyConsent']],
    ) {}
}