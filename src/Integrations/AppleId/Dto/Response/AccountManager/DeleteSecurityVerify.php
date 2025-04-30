<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\PhoneNumber;
class DeleteSecurityVerify extends Data
{
    // {
    //     "phoneNumber": {
    //         "nonFTEU": true,
    //         "deviceType": false,
    //         "iMessageType": false,
    //         "pacType": false,
    //         "complianceType": false,
    //         "appleComplianceType": false,
    //         "numberWithDialCode": "+62 831-2992-0593",
    //         "numberWithDialCodeAndExtension": "+62 831-2992-0593",
    //         "verifiedDate": "04/30/2025 11:45:45 AM",
    //         "rawNumber": "83129920593",
    //         "fullNumberWithCountryPrefix": "+62 831-2992-0593",
    //         "verified": true,
    //         "countryDialCode": "62",
    //         "number": "83129920593",
    //         "pushMode": "sms",
    //         "vetted": true,
    //         "createDate": "04/30/2025 11:45:10 AM",
    //         "countryCode": "ID",
    //         "updateDate": "04/30/2025 11:45:45 AM",
    //         "sameAsAppleID": false,
    //         "rawNumberWithDialCode": "+6283129920593",
    //         "pending": false,
    //         "lastTwoDigits": "93",
    //         "loginHandle": false,
    //         "countryCodeAsString": "ID",
    //         "obfuscatedNumber": "••••-••••-••93",
    //         "name": "+62 831-2992-0593",
    //         "id": 1
    //     },
    //     "allowPhoneNumberRemoval": false,
    //     "nonFTEUEnabled": false
    // }
    public function __construct(
        public PhoneNumber $phoneNumber,
        public bool $allowPhoneNumberRemoval = false,
        public bool $nonFTEUEnabled = false,
    ) {
    }
}