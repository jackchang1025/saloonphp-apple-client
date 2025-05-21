<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Validate extends Data
{
    // {
    //     "phoneNumberVerification": {
    //         "phoneNumber": {
    //             "id": 1,
    //             "number": "(941) 589-5322",
    //             "countryCode": "US",
    //             "countryDialCode": "1",
    //             "nonFTEU": true
    //         },
    //         "mode": "sms"
    //     },
    //     "account": {
    //         "name": "admin@xxxxxx.team",
    //         "password": ".yR5iaS4P.W_9F9",
    //         "person": {
    //             "name": {
    //                 "firstName": "chang",
    //                 "lastName": "matthew"
    //             },
    //             "birthday": "1996-06-12",
    //             "primaryAddress": {
    //                 "country": "USA"
    //             }
    //         },
    //         "preferences": {
    //             "preferredLanguage": "zh_CN",
    //             "marketingPreferences": {
    //                 "appleNews": false,
    //                 "appleUpdates": true,
    //                 "iTunesUpdates": true
    //             }
    //         },
    //         "verificationInfo": {
    //             "id": "",
    //             "answer": ""
    //         }
    //     },
    //     "captcha": {
    //         "id": 1484616500,
    //         "token": "6b48998b36c874a7192c1b38dae512a240b67022f39e679527dc585a57a246ea5caea3c3d3b43145f61728fc78db6919274ed6ddada76fa02a124fcaa9e7dd317d57fbc6c0bd0b2703699fdc109e2bbcaa9444ba532c8db5987c58d5bf58428f781ef53a0af4bcfc402376df1b7a0a1b9abb2b51715e932a948afc88268ed1f5fb2e85e184681255936707f90b56de9213148479edb131182f06476c268ea344e694fe9c506db9ea9b7ebb48137401f82b5ad387d24056d2b1761243c3179c76QBBV",
    //         "answer": "txr2"
    //     },
    //     "privacyPolicyChecked": false
    // }

    public function __construct(
        public PhoneNumberVerification $phoneNumberVerification,
        public Account $account,
        public Captcha $captcha,
        public bool $privacyPolicyChecked = false,
    ) {}
}
