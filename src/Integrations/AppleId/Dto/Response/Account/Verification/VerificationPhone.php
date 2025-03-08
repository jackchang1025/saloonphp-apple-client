<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Account\Verification;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;


class VerificationPhone extends Data
{
    // {
    //     "account": {
    //         "name": "gobzvczeauhqz@hotmail.com",
    //         "formattedAccountName": "gobzvczeauhqz@hotmail.com",
    //         "namePrefix": "gobzvczeauhqz",
    //         "nameSuffix": "@hotmail.com",
    //         "person": {
    //             "primaryAddress": {
    //                 "defaultAddress": false,
    //                 "stateProvinceInvalid": true,
    //                 "korean": false,
    //                 "japanese": false,
    //                 "fullAddress": "",
    //                 "primary": true,
    //                 "shipping": false,
    //                 "countryCode": "USA",
    //                 "usa": true,
    //                 "canada": false,
    //                 "preferred": false,
    //                 "type": "primary"
    //             },
    //             "shippingAddresses": [],
    //             "primaryEmailAddress": {
    //                 "address": "gobzvczeauhqz@hotmail.com",
    //                 "addressPrefix": "gobzvczeauhqz",
    //                 "addressSuffix": "@hotmail.com",
    //                 "isEmailSameAsAccountName": false,
    //                 "vetted": false
    //             },
    //             "hasPendingAccountName": false,
    //             "allowAdditionalAlternateEmail": false,
    //             "maxAllowedSharedNumbers": 0,
    //             "isUnderAge": false,
    //             "hasFamily": false,
    //             "isFamilyOrganizer": false,
    //             "isDateOfBirthEditable": false,
    //             "isHSA2Eligible": false,
    //             "requiresGdprChildConsent": false,
    //             "hasPaymentMethod": false,
    //             "formattedAccountName": "gobzvczeauhqz@hotmail.com",
    //             "minBirthday": "1875-03-02",
    //             "maxBirthday": "2025-12-31",
    //             "accountName": "gobzvczeauhqz@hotmail.com",
    //             "phoneNumbers": [],
    //             "managedAdministrator": false,
    //             "birthday": "1986-08-09",
    //             "maxAllowedAlternateEmails": 0,
    //             "name": {
    //                 "middleNameRequired": false,
    //                 "firstName": "Jack",
    //                 "lastName": "Chang"
    //             }
    //         },
    //         "verificationInfo": {
    //             "answer": "557056",
    //             "id": "001428-00-9964d31ebac2e0f20e9cefe28a113c490667d2c2b49286c8320c973361489bd0LTOW"
    //         },
    //         "preferences": {
    //             "preferredLanguage": "en_US",
    //             "marketingPreferences": {
    //                 "appleUpdates": true,
    //                 "iTunesUpdates": true,
    //                 "appleNews": false,
    //                 "appleMusic": false
    //             }
    //         },
    //         "recycled": false,
    //         "dataRecoveryServiceStatusReadableOnUI": false,
    //         "custodianCountReadableOnUI": false,
    //         "appleIDEditable": false,
    //         "paymentMethodStatus": "NOT_LOADED",
    //         "ownsFamilyPaymentMethod": false,
    //         "hasFamilyPaymentMethod": false,
    //         "hasPrimaryPaymentMethod": false,
    //         "hasCustodians": false,
    //         "obfuscatedName": "go******************************",
    //         "eligibleForLegacyRk": false,
    //         "legacyRkExists": false,
    //         "modernRkExists": false,
    //         "paidMessagesApplicable": false,
    //         "reclaimed": false,
    //         "federated": false,
    //         "paidaccount": false,
    //         "internalAccount": false
    //     },
    //     "captcha": {
    //         "answer": "1ddq6",
    //         "token": "85761e2245bfd06c5c6acf34e50254635638e6caa8c995e7756fbc1d58c590c61e503fe70077c86979927256788c97526a86efb642f9f6828d7865d1950e30d25de880620cff0364cdf9e4b0c8bab2c78676fa009bda0a489fe3ce87b2d289572e99e39de25f2e777a6c7ee65e3222712a49bdeffd7ae356953cc6866409c4e7224eb5c26080bb028fa983248bf8437534622a66adcc83392a03422ef29b259fda7f9a240dde3b8e187e4037111b7717133d1fe09f44f40695ad9106e573ed56fb1b2adca956ab44ef28377b07974bd7LJZA",
    //         "id": -921261205
    //     },
    //     "phoneNumberVerification": {
    //         "phoneNumber": {
    //             "numberWithDialCodeAndExtension": "+1 (234) 234-3243",
    //             "pacType": false,
    //             "complianceType": false,
    //             "appleComplianceType": false,
    //             "numberWithDialCode": "+1 (234) 234-3243",
    //             "deviceType": false,
    //             "iMessageType": false,
    //             "nonFTEU": true,
    //             "sameAsAppleID": false,
    //             "rawNumber": "2342343243",
    //             "fullNumberWithCountryPrefix": "+1 (234) 234-3243",
    //             "obfuscatedNumber": "(•••) •••-••43",
    //             "verified": false,
    //             "countryCode": "US",
    //             "pushMode": "sms",
    //             "vetted": false,
    //             "countryDialCode": "1",
    //             "number": "(234) 234-3243",
    //             "createDate": "03/02/2025 09:08:45 AM",
    //             "updateDate": "03/02/2025 09:08:45 AM",
    //             "rawNumberWithDialCode": "+12342343243",
    //             "pending": true,
    //             "lastTwoDigits": "43",
    //             "loginHandle": false,
    //             "countryCodeAsString": "US",
    //             "name": "+1 (234) 234-3243",
    //             "id": 1
    //         },
    //         "securityCode": {
    //             "length": 6,
    //             "tooManyCodesSent": false,
    //             "tooManyCodesValidated": false,
    //             "securityCodeLocked": false,
    //             "securityCodeCooldown": false
    //         },
    //         "mode": "sms",
    //         "type": "verification",
    //         "authenticationType": "hsa2",
    //         "showAutoVerificationUI": false,
    //         "keepUsing": false,
    //         "changePhoneNumber": false,
    //         "simSwapPhoneNumber": false,
    //         "addDifferent": false,
    //         "countryCode": "US",
    //         "countryDialCode": "1",
    //         "number": "(234) 234-3243"
    //     },
    //     "privacyPolicyChecked": false
    // }
    public function __construct(
        public array $account,
        public array $captcha,
        public array $phoneNumberVerification,
        public bool $privacyPolicyChecked,
    ) {}
}
