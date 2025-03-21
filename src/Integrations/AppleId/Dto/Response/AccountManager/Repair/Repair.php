<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Repair;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Repair extends Data
{
    // {
    //     "success": 0,
    //     "features": {
    //         "hsa2Eligibility": {
    //             "status": "eligible",
    //             "primaryAuthFactorPolicy": {
    //                 "authFactor": "primary_password",
    //                 "type": "standard",
    //                 "primary": true,
    //                 "secondary": false,
    //                 "custom": false,
    //                 "digit": false,
    //                 "alphaNumeric": false
    //             },
    //             "requireiCloudAccount": false,
    //             "requiresEmailRepair": false,
    //             "yellowPath": false,
    //             "greenPath": false,
    //             "redPath": false,
    //             "requiresVerification": false,
    //             "requireiCloudAccountEnabled": false,
    //             "eligible": true
    //         },
    //         "paidAccountEligibility": {
    //             "status": "ineligible",
    //             "eligible": false
    //         },
    //         "phoneNumberAppleIDEligible": false,
    //         "hsa2Eligible": true,
    //         "managedAppleIDEligible": false,
    //         "profileEligible": false,
    //         "trustedPhoneNumberEligible": true,
    //         "enforceEmailVerification": false,
    //         "securityQuestionsEligible": false,
    //         "hsa2Mandatory": false,
    //         "phoneNumberRequired": false,
    //         "phoneNumberRequirementGracePeriodEnded": false,
    //         "displayPasscodeNudge": false
    //     },
    //     "passwordPolicy": {},
    //     "displayWarnings": false,
    //     "phoneNumberVerification": {
    //         "phoneNumber": {
    //             "sameAsAppleID": false,
    //             "nonFTEU": false,
    //             "numberWithDialCode": "+1 (470) 752-2811",
    //             "deviceType": false,
    //             "iMessageType": false,
    //             "pacType": false,
    //             "complianceType": false,
    //             "appleComplianceType": false,
    //             "numberWithDialCodeAndExtension": "+1 (470) 752-2811",
    //             "verified": false,
    //             "rawNumber": "4707522811",
    //             "fullNumberWithCountryPrefix": "+1 (470) 752-2811",
    //             "countryCode": "US",
    //             "pushMode": "sms",
    //             "countryDialCode": "1",
    //             "number": "(470) 752-2811",
    //             "vetted": false,
    //             "createDate": "03/20/2025 08:56:03 AM",
    //             "updateDate": "03/20/2025 08:56:03 AM",
    //             "rawNumberWithDialCode": "+14707522811",
    //             "pending": true,
    //             "lastTwoDigits": "11",
    //             "loginHandle": false,
    //             "countryCodeAsString": "US",
    //             "obfuscatedNumber": "(•••) •••-••11",
    //             "name": "+1 (470) 752-2811",
    //             "id": 20101
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
    //         "countryCode": "US",
    //         "countryDialCode": "1",
    //         "number": "(470) 752-2811",
    //         "keepUsing": false,
    //         "changePhoneNumber": false,
    //         "simSwapPhoneNumber": false,
    //         "addDifferent": false
    //     },
    //     "paymentVerification": {
    //         "success": 0,
    //         "actionValidationSuccessful": false,
    //         "clientActionCancel": false,
    //         "successful": false
    //     },
    //     "countries": [
    //         {
    //             "code": "AFG",
    //             "code2": "AF",
    //             "name": "Afghanistan",
    //             "dialCode": "93",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+93 (Afghanistan)"
    //         },
    //         {
    //             "code": "ALA",
    //             "code2": "AX",
    //             "name": "Åland Islands",
    //             "dialCode": "358",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+358 (Åland Islands)"
    //         },
    //         {
    //             "code": "ALB",
    //             "code2": "AL",
    //             "name": "Albania",
    //             "dialCode": "355",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+355 (Albania)"
    //         },
    //         {
    //             "code": "DZA",
    //             "code2": "DZ",
    //             "name": "Algeria",
    //             "dialCode": "213",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 19,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+213 (Algeria)"
    //         },
    //         {
    //             "code": "ASM",
    //             "code2": "AS",
    //             "name": "American Samoa",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (American Samoa)"
    //         },
    //         {
    //             "code": "AND",
    //             "code2": "AD",
    //             "name": "Andorra",
    //             "dialCode": "376",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+376 (Andorra)"
    //         },
    //         {
    //             "code": "AGO",
    //             "code2": "AO",
    //             "name": "Angola",
    //             "dialCode": "244",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+244 (Angola)"
    //         },
    //         {
    //             "code": "AIA",
    //             "code2": "AI",
    //             "name": "Anguilla",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "AIA",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "AI"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Anguilla)"
    //         },
    //         {
    //             "code": "ATA",
    //             "code2": "AQ",
    //             "name": "Antarctica",
    //             "dialCode": "672",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+672 (Antarctica)"
    //         },
    //         {
    //             "code": "ATG",
    //             "code2": "AG",
    //             "name": "Antigua And Barbuda",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "ATG",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "AG"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Antigua And Barbuda)"
    //         },
    //         {
    //             "code": "ARG",
    //             "code2": "AR",
    //             "name": "Argentina",
    //             "dialCode": "54",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+54 (Argentina)"
    //         },
    //         {
    //             "code": "ARM",
    //             "code2": "AM",
    //             "name": "Armenia",
    //             "dialCode": "374",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+374 (Armenia)"
    //         },
    //         {
    //             "code": "ABW",
    //             "code2": "AW",
    //             "name": "Aruba",
    //             "dialCode": "297",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+297 (Aruba)"
    //         },
    //         {
    //             "code": "AUS",
    //             "code2": "AU",
    //             "name": "Australia",
    //             "dialCode": "61",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+61 (Australia)"
    //         },
    //         {
    //             "code": "AUT",
    //             "code2": "AT",
    //             "name": "Austria",
    //             "dialCode": "43",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+43 (Austria)"
    //         },
    //         {
    //             "code": "AZE",
    //             "code2": "AZ",
    //             "name": "Azerbaijan",
    //             "dialCode": "994",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+994 (Azerbaijan)"
    //         },
    //         {
    //             "code": "BHS",
    //             "code2": "BS",
    //             "name": "Bahamas",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "BHS",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "BS"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Bahamas)"
    //         },
    //         {
    //             "code": "BHR",
    //             "code2": "BH",
    //             "name": "Bahrain",
    //             "dialCode": "973",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+973 (Bahrain)"
    //         },
    //         {
    //             "code": "BGD",
    //             "code2": "BD",
    //             "name": "Bangladesh",
    //             "dialCode": "880",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+880 (Bangladesh)"
    //         },
    //         {
    //             "code": "BRB",
    //             "code2": "BB",
    //             "name": "Barbados",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "BRB",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "BB"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Barbados)"
    //         },
    //         {
    //             "code": "BLR",
    //             "code2": "BY",
    //             "name": "Belarus",
    //             "dialCode": "375",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+375 (Belarus)"
    //         },
    //         {
    //             "code": "BEL",
    //             "code2": "BE",
    //             "name": "Belgium",
    //             "dialCode": "32",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+32 (Belgium)"
    //         },
    //         {
    //             "code": "BLZ",
    //             "code2": "BZ",
    //             "name": "Belize",
    //             "dialCode": "501",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+501 (Belize)"
    //         },
    //         {
    //             "code": "BEN",
    //             "code2": "BJ",
    //             "name": "Benin",
    //             "dialCode": "229",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+229 (Benin)"
    //         },
    //         {
    //             "code": "BMU",
    //             "code2": "BM",
    //             "name": "Bermuda",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Bermuda)"
    //         },
    //         {
    //             "code": "BTN",
    //             "code2": "BT",
    //             "name": "Bhutan",
    //             "dialCode": "975",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+975 (Bhutan)"
    //         },
    //         {
    //             "code": "BOL",
    //             "code2": "BO",
    //             "name": "Bolivia",
    //             "dialCode": "591",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+591 (Bolivia)"
    //         },
    //         {
    //             "code": "BIH",
    //             "code2": "BA",
    //             "name": "Bosnia and Herzegovina",
    //             "dialCode": "387",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+387 (Bosnia and Herzegovina)"
    //         },
    //         {
    //             "code": "BWA",
    //             "code2": "BW",
    //             "name": "Botswana",
    //             "dialCode": "267",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+267 (Botswana)"
    //         },
    //         {
    //             "code": "BVT",
    //             "code2": "BV",
    //             "name": "Bouvet Island",
    //             "dialCode": "47",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+47 (Bouvet Island)"
    //         },
    //         {
    //             "code": "BRA",
    //             "code2": "BR",
    //             "name": "Brazil",
    //             "dialCode": "55",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+55 (Brazil)"
    //         },
    //         {
    //             "code": "VGB",
    //             "code2": "VG",
    //             "name": "British Virgin Islands",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "VGB",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "VG"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (British Virgin Islands)"
    //         },
    //         {
    //             "code": "BRN",
    //             "code2": "BN",
    //             "name": "Brunei Darussalam",
    //             "dialCode": "673",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+673 (Brunei Darussalam)"
    //         },
    //         {
    //             "code": "BGR",
    //             "code2": "BG",
    //             "name": "Bulgaria",
    //             "dialCode": "359",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+359 (Bulgaria)"
    //         },
    //         {
    //             "code": "BFA",
    //             "code2": "BF",
    //             "name": "Burkina Faso",
    //             "dialCode": "226",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 20,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+226 (Burkina Faso)"
    //         },
    //         {
    //             "code": "BDI",
    //             "code2": "BI",
    //             "name": "Burundi",
    //             "dialCode": "257",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+257 (Burundi)"
    //         },
    //         {
    //             "code": "KHM",
    //             "code2": "KH",
    //             "name": "Cambodia",
    //             "dialCode": "855",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+855 (Cambodia)"
    //         },
    //         {
    //             "code": "CMR",
    //             "code2": "CM",
    //             "name": "Cameroon",
    //             "dialCode": "237",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+237 (Cameroon)"
    //         },
    //         {
    //             "code": "CAN",
    //             "code2": "CA",
    //             "name": "Canada",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 19,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "(xxx) xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     1,
    //                     4,
    //                     6,
    //                     9,
    //                     10,
    //                     14
    //                 ],
    //                 "minDigitLength": 10,
    //                 "maxDigitLength": 10,
    //                 "countryCode": "CAN",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "CA"
    //             },
    //             "supportPaidAccount": false,
    //             "stateProvinces": [
    //                 {
    //                     "code": "AB",
    //                     "name": "Alberta"
    //                 },
    //                 {
    //                     "code": "BC",
    //                     "name": "British Columbia"
    //                 },
    //                 {
    //                     "code": "MB",
    //                     "name": "Manitoba"
    //                 },
    //                 {
    //                     "code": "NB",
    //                     "name": "New Brunswick"
    //                 },
    //                 {
    //                     "code": "NF",
    //                     "name": "Newfoundland & Labrador"
    //                 },
    //                 {
    //                     "code": "NS",
    //                     "name": "Nova Scotia"
    //                 },
    //                 {
    //                     "code": "NT",
    //                     "name": "Northwest Territories"
    //                 },
    //                 {
    //                     "code": "NU",
    //                     "name": "Nunavut"
    //                 },
    //                 {
    //                     "code": "ON",
    //                     "name": "Ontario"
    //                 },
    //                 {
    //                     "code": "PE",
    //                     "name": "Prince Edward Island"
    //                 },
    //                 {
    //                     "code": "QC",
    //                     "name": "Quebec"
    //                 },
    //                 {
    //                     "code": "SK",
    //                     "name": "Saskatchewan"
    //                 },
    //                 {
    //                     "code": "YT",
    //                     "name": "Yukon"
    //                 }
    //             ],
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": true,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Canada)"
    //         },
    //         {
    //             "code": "CPV",
    //             "code2": "CV",
    //             "name": "Cape Verde",
    //             "dialCode": "238",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+238 (Cape Verde)"
    //         },
    //         {
    //             "code": "BES",
    //             "code2": "BQ",
    //             "name": "Caribbean Netherlands",
    //             "dialCode": "599",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+599 (Caribbean Netherlands)"
    //         },
    //         {
    //             "code": "CYM",
    //             "code2": "KY",
    //             "name": "Cayman Islands",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "CYM",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "KY"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Cayman Islands)"
    //         },
    //         {
    //             "code": "CAF",
    //             "code2": "CF",
    //             "name": "Central African Republic",
    //             "dialCode": "236",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+236 (Central African Republic)"
    //         },
    //         {
    //             "code": "TCD",
    //             "code2": "TD",
    //             "name": "Chad",
    //             "dialCode": "235",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+235 (Chad)"
    //         },
    //         {
    //             "code": "IOT",
    //             "code2": "IO",
    //             "name": "Chagos Archipelago",
    //             "dialCode": "246",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+246 (Chagos Archipelago)"
    //         },
    //         {
    //             "code": "CHL",
    //             "code2": "CL",
    //             "name": "Chile",
    //             "dialCode": "56",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+56 (Chile)"
    //         },
    //         {
    //             "code": "CHN",
    //             "code2": "CN",
    //             "name": "China mainland",
    //             "dialCode": "86",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx xxxx xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8,
    //                     9,
    //                     13
    //                 ],
    //                 "minDigitLength": 1,
    //                 "maxDigitLength": 11,
    //                 "countryCode": "CHN",
    //                 "countryDialCode": "86",
    //                 "countryCode2": "CN"
    //             },
    //             "supportPaidAccount": true,
    //             "stateProvinces": [
    //                 {
    //                     "code": "110",
    //                     "name": "Anhui"
    //                 },
    //                 {
    //                     "code": "10",
    //                     "name": "Beijing"
    //                 },
    //                 {
    //                     "code": "11",
    //                     "name": "Chongqing"
    //                 },
    //                 {
    //                     "code": "150",
    //                     "name": "Fujian"
    //                 },
    //                 {
    //                     "code": "260",
    //                     "name": "Gansu"
    //                 },
    //                 {
    //                     "code": "190",
    //                     "name": "Guangdong"
    //                 },
    //                 {
    //                     "code": "210",
    //                     "name": "Guangxi"
    //                 },
    //                 {
    //                     "code": "220",
    //                     "name": "Guizhou"
    //                 },
    //                 {
    //                     "code": "200",
    //                     "name": "Hainan"
    //                 },
    //                 {
    //                     "code": "60",
    //                     "name": "Hebei"
    //                 },
    //                 {
    //                     "code": "90",
    //                     "name": "Heilongjiang"
    //                 },
    //                 {
    //                     "code": "180",
    //                     "name": "Henan"
    //                 },
    //                 {
    //                     "code": "170",
    //                     "name": "Hubei"
    //                 },
    //                 {
    //                     "code": "160",
    //                     "name": "Hunan"
    //                 },
    //                 {
    //                     "code": "100",
    //                     "name": "Jiangsu"
    //                 },
    //                 {
    //                     "code": "140",
    //                     "name": "Jiangxi"
    //                 },
    //                 {
    //                     "code": "80",
    //                     "name": "Jilin"
    //                 },
    //                 {
    //                     "code": "70",
    //                     "name": "Liaoning"
    //                 },
    //                 {
    //                     "code": "40",
    //                     "name": "Neimenggu"
    //                 },
    //                 {
    //                     "code": "270",
    //                     "name": "Ningxia"
    //                 },
    //                 {
    //                     "code": "280",
    //                     "name": "Qinghai"
    //                 },
    //                 {
    //                     "code": "250",
    //                     "name": "Shaanxi"
    //                 },
    //                 {
    //                     "code": "120",
    //                     "name": "Shandong"
    //                 },
    //                 {
    //                     "code": "20",
    //                     "name": "Shanghai"
    //                 },
    //                 {
    //                     "code": "50",
    //                     "name": "Shanxi"
    //                 },
    //                 {
    //                     "code": "230",
    //                     "name": "Sichuan"
    //                 },
    //                 {
    //                     "code": "30",
    //                     "name": "Tianjin"
    //                 },
    //                 {
    //                     "code": "290",
    //                     "name": "Xinjiang"
    //                 },
    //                 {
    //                     "code": "300",
    //                     "name": "Xizang"
    //                 },
    //                 {
    //                     "code": "240",
    //                     "name": "Yunnan"
    //                 },
    //                 {
    //                     "code": "130",
    //                     "name": "Zhejiang"
    //                 }
    //             ],
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+86 (China mainland)"
    //         },
    //         {
    //             "code": "CXR",
    //             "code2": "CX",
    //             "name": "Christmas Island",
    //             "dialCode": "61",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+61 (Christmas Island)"
    //         },
    //         {
    //             "code": "CCK",
    //             "code2": "CC",
    //             "name": "Cocos (Keeling) Islands",
    //             "dialCode": "61",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+61 (Cocos (Keeling) Islands)"
    //         },
    //         {
    //             "code": "COL",
    //             "code2": "CO",
    //             "name": "Colombia",
    //             "dialCode": "57",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+57 (Colombia)"
    //         },
    //         {
    //             "code": "COM",
    //             "code2": "KM",
    //             "name": "Comoros",
    //             "dialCode": "269",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+269 (Comoros)"
    //         },
    //         {
    //             "code": "COK",
    //             "code2": "CK",
    //             "name": "Cook Islands",
    //             "dialCode": "682",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+682 (Cook Islands)"
    //         },
    //         {
    //             "code": "CRI",
    //             "code2": "CR",
    //             "name": "Costa Rica",
    //             "dialCode": "506",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+506 (Costa Rica)"
    //         },
    //         {
    //             "code": "CIV",
    //             "code2": "CI",
    //             "name": "Côte d'Ivoire",
    //             "dialCode": "225",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+225 (Côte d'Ivoire)"
    //         },
    //         {
    //             "code": "HRV",
    //             "code2": "HR",
    //             "name": "Croatia",
    //             "dialCode": "385",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+385 (Croatia)"
    //         },
    //         {
    //             "code": "CUW",
    //             "code2": "CW",
    //             "name": "Curaçao",
    //             "dialCode": "599",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+599 (Curaçao)"
    //         },
    //         {
    //             "code": "CYP",
    //             "code2": "CY",
    //             "name": "Cyprus",
    //             "dialCode": "357",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+357 (Cyprus)"
    //         },
    //         {
    //             "code": "CZE",
    //             "code2": "CZ",
    //             "name": "Czechia",
    //             "dialCode": "420",
    //             "embargoed": false,
    //             "underAgeLimit": 15,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx xxx xxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     7,
    //                     8,
    //                     11
    //                 ],
    //                 "minDigitLength": 9,
    //                 "maxDigitLength": 9,
    //                 "countryCode": "CZE",
    //                 "countryDialCode": "420",
    //                 "countryCode2": "CZ"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+420 (Czechia)"
    //         },
    //         {
    //             "code": "COD",
    //             "code2": "CD",
    //             "name": "Democratic Republic of the Congo",
    //             "dialCode": "243",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+243 (Democratic Republic of the Congo)"
    //         },
    //         {
    //             "code": "DNK",
    //             "code2": "DK",
    //             "name": "Denmark",
    //             "dialCode": "45",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+45 (Denmark)"
    //         },
    //         {
    //             "code": "DJI",
    //             "code2": "DJ",
    //             "name": "Djibouti",
    //             "dialCode": "253",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+253 (Djibouti)"
    //         },
    //         {
    //             "code": "DMA",
    //             "code2": "DM",
    //             "name": "Dominica",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "DMA",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "DM"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Dominica)"
    //         },
    //         {
    //             "code": "DOM",
    //             "code2": "DO",
    //             "name": "Dominican Republic",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Dominican Republic)"
    //         },
    //         {
    //             "code": "ECU",
    //             "code2": "EC",
    //             "name": "Ecuador",
    //             "dialCode": "593",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+593 (Ecuador)"
    //         },
    //         {
    //             "code": "EGY",
    //             "code2": "EG",
    //             "name": "Egypt",
    //             "dialCode": "20",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+20 (Egypt)"
    //         },
    //         {
    //             "code": "SLV",
    //             "code2": "SV",
    //             "name": "El Salvador",
    //             "dialCode": "503",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+503 (El Salvador)"
    //         },
    //         {
    //             "code": "GNQ",
    //             "code2": "GQ",
    //             "name": "Equatorial Guinea",
    //             "dialCode": "240",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+240 (Equatorial Guinea)"
    //         },
    //         {
    //             "code": "ERI",
    //             "code2": "ER",
    //             "name": "Eritrea",
    //             "dialCode": "291",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+291 (Eritrea)"
    //         },
    //         {
    //             "code": "EST",
    //             "code2": "EE",
    //             "name": "Estonia",
    //             "dialCode": "372",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+372 (Estonia)"
    //         },
    //         {
    //             "code": "SWZ",
    //             "code2": "SZ",
    //             "name": "Eswatini",
    //             "dialCode": "268",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+268 (Eswatini)"
    //         },
    //         {
    //             "code": "ETH",
    //             "code2": "ET",
    //             "name": "Ethiopia",
    //             "dialCode": "251",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+251 (Ethiopia)"
    //         },
    //         {
    //             "code": "FLK",
    //             "code2": "FK",
    //             "name": "Falkland Islands",
    //             "dialCode": "500",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+500 (Falkland Islands)"
    //         },
    //         {
    //             "code": "FRO",
    //             "code2": "FO",
    //             "name": "Faroe Islands",
    //             "dialCode": "298",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+298 (Faroe Islands)"
    //         },
    //         {
    //             "code": "FJI",
    //             "code2": "FJ",
    //             "name": "Fiji",
    //             "dialCode": "679",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+679 (Fiji)"
    //         },
    //         {
    //             "code": "FIN",
    //             "code2": "FI",
    //             "name": "Finland",
    //             "dialCode": "358",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+358 (Finland)"
    //         },
    //         {
    //             "code": "FRA",
    //             "code2": "FR",
    //             "name": "France",
    //             "dialCode": "33",
    //             "embargoed": false,
    //             "underAgeLimit": 15,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xx xx xx xx xx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     2,
    //                     3,
    //                     5,
    //                     6,
    //                     8,
    //                     9,
    //                     11,
    //                     12,
    //                     14
    //                 ],
    //                 "minDigitLength": 1,
    //                 "maxDigitLength": 10,
    //                 "countryCode": "FRA",
    //                 "countryDialCode": "33",
    //                 "countryCode2": "FR"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+33 (France)"
    //         },
    //         {
    //             "code": "GUF",
    //             "code2": "GF",
    //             "name": "French Guiana",
    //             "dialCode": "594",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+594 (French Guiana)"
    //         },
    //         {
    //             "code": "PYF",
    //             "code2": "PF",
    //             "name": "French Polynesia",
    //             "dialCode": "689",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+689 (French Polynesia)"
    //         },
    //         {
    //             "code": "ATF",
    //             "code2": "TF",
    //             "name": "French Southern Territories",
    //             "dialCode": "262",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+262 (French Southern Territories)"
    //         },
    //         {
    //             "code": "GAB",
    //             "code2": "GA",
    //             "name": "Gabon",
    //             "dialCode": "241",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+241 (Gabon)"
    //         },
    //         {
    //             "code": "GMB",
    //             "code2": "GM",
    //             "name": "Gambia",
    //             "dialCode": "220",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+220 (Gambia)"
    //         },
    //         {
    //             "code": "GEO",
    //             "code2": "GE",
    //             "name": "Georgia",
    //             "dialCode": "995",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+995 (Georgia)"
    //         },
    //         {
    //             "code": "DEU",
    //             "code2": "DE",
    //             "name": "Germany",
    //             "dialCode": "49",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+49 (Germany)"
    //         },
    //         {
    //             "code": "GHA",
    //             "code2": "GH",
    //             "name": "Ghana",
    //             "dialCode": "233",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+233 (Ghana)"
    //         },
    //         {
    //             "code": "GIB",
    //             "code2": "GI",
    //             "name": "Gibraltar",
    //             "dialCode": "350",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+350 (Gibraltar)"
    //         },
    //         {
    //             "code": "GRC",
    //             "code2": "GR",
    //             "name": "Greece",
    //             "dialCode": "30",
    //             "embargoed": false,
    //             "underAgeLimit": 15,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx xxx xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     7,
    //                     8,
    //                     12
    //                 ],
    //                 "minDigitLength": 10,
    //                 "maxDigitLength": 10,
    //                 "countryCode": "GRC",
    //                 "countryDialCode": "30",
    //                 "countryCode2": "GR"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+30 (Greece)"
    //         },
    //         {
    //             "code": "GRL",
    //             "code2": "GL",
    //             "name": "Greenland",
    //             "dialCode": "299",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+299 (Greenland)"
    //         },
    //         {
    //             "code": "GRD",
    //             "code2": "GD",
    //             "name": "Grenada",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "GRD",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "GD"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Grenada)"
    //         },
    //         {
    //             "code": "GLP",
    //             "code2": "GP",
    //             "name": "Guadeloupe",
    //             "dialCode": "590",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+590 (Guadeloupe)"
    //         },
    //         {
    //             "code": "GUM",
    //             "code2": "GU",
    //             "name": "Guam",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Guam)"
    //         },
    //         {
    //             "code": "GTM",
    //             "code2": "GT",
    //             "name": "Guatemala",
    //             "dialCode": "502",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+502 (Guatemala)"
    //         },
    //         {
    //             "code": "GGY",
    //             "code2": "GG",
    //             "name": "Guernsey",
    //             "dialCode": "44",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+44 (Guernsey)"
    //         },
    //         {
    //             "code": "GIN",
    //             "code2": "GN",
    //             "name": "Guinea",
    //             "dialCode": "224",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+224 (Guinea)"
    //         },
    //         {
    //             "code": "GNB",
    //             "code2": "GW",
    //             "name": "Guinea-Bissau",
    //             "dialCode": "245",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+245 (Guinea-Bissau)"
    //         },
    //         {
    //             "code": "GUY",
    //             "code2": "GY",
    //             "name": "Guyana",
    //             "dialCode": "592",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+592 (Guyana)"
    //         },
    //         {
    //             "code": "HTI",
    //             "code2": "HT",
    //             "name": "Haiti",
    //             "dialCode": "509",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+509 (Haiti)"
    //         },
    //         {
    //             "code": "HMD",
    //             "code2": "HM",
    //             "name": "Heard And Mc Donald Islands",
    //             "dialCode": "61",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+61 (Heard And Mc Donald Islands)"
    //         },
    //         {
    //             "code": "HND",
    //             "code2": "HN",
    //             "name": "Honduras",
    //             "dialCode": "504",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+504 (Honduras)"
    //         },
    //         {
    //             "code": "HKG",
    //             "code2": "HK",
    //             "name": "Hong Kong",
    //             "dialCode": "852",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+852 (Hong Kong)"
    //         },
    //         {
    //             "code": "HUN",
    //             "code2": "HU",
    //             "name": "Hungary",
    //             "dialCode": "36",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+36 (Hungary)"
    //         },
    //         {
    //             "code": "ISL",
    //             "code2": "IS",
    //             "name": "Iceland",
    //             "dialCode": "354",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+354 (Iceland)"
    //         },
    //         {
    //             "code": "IND",
    //             "code2": "IN",
    //             "name": "India",
    //             "dialCode": "91",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx xxx xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     7,
    //                     8,
    //                     12
    //                 ],
    //                 "minDigitLength": 10,
    //                 "maxDigitLength": 10,
    //                 "countryCode": "IND",
    //                 "countryDialCode": "91",
    //                 "countryCode2": "IN"
    //             },
    //             "supportPaidAccount": true,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+91 (India)"
    //         },
    //         {
    //             "code": "IDN",
    //             "code2": "ID",
    //             "name": "Indonesia",
    //             "dialCode": "62",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+62 (Indonesia)"
    //         },
    //         {
    //             "code": "IRQ",
    //             "code2": "IQ",
    //             "name": "Iraq",
    //             "dialCode": "964",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+964 (Iraq)"
    //         },
    //         {
    //             "code": "IRL",
    //             "code2": "IE",
    //             "name": "Ireland",
    //             "dialCode": "353",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+353 (Ireland)"
    //         },
    //         {
    //             "code": "IMN",
    //             "code2": "IM",
    //             "name": "Isle of Man",
    //             "dialCode": "44",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+44 (Isle of Man)"
    //         },
    //         {
    //             "code": "ISR",
    //             "code2": "IL",
    //             "name": "Israel",
    //             "dialCode": "972",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+972 (Israel)"
    //         },
    //         {
    //             "code": "ITA",
    //             "code2": "IT",
    //             "name": "Italy",
    //             "dialCode": "39",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+39 (Italy)"
    //         },
    //         {
    //             "code": "JAM",
    //             "code2": "JM",
    //             "name": "Jamaica",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "JAM",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "JM"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Jamaica)"
    //         },
    //         {
    //             "code": "JPN",
    //             "code2": "JP",
    //             "name": "Japan",
    //             "dialCode": "81",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "stateProvinces": [
    //                 {
    //                     "code": "1",
    //                     "name": "Hokkaido"
    //                 },
    //                 {
    //                     "code": "2",
    //                     "name": "Aomori"
    //                 },
    //                 {
    //                     "code": "3",
    //                     "name": "Iwate"
    //                 },
    //                 {
    //                     "code": "4",
    //                     "name": "Miyagi"
    //                 },
    //                 {
    //                     "code": "5",
    //                     "name": "Akita"
    //                 },
    //                 {
    //                     "code": "6",
    //                     "name": "Yamagata"
    //                 },
    //                 {
    //                     "code": "7",
    //                     "name": "Fukushima"
    //                 },
    //                 {
    //                     "code": "48",
    //                     "name": "Ibaraki"
    //                 },
    //                 {
    //                     "code": "9",
    //                     "name": "Tochigi"
    //                 },
    //                 {
    //                     "code": "10",
    //                     "name": "Gunma"
    //                 },
    //                 {
    //                     "code": "11",
    //                     "name": "Saitama"
    //                 },
    //                 {
    //                     "code": "12",
    //                     "name": "Chiba"
    //                 },
    //                 {
    //                     "code": "13",
    //                     "name": "Tokyo"
    //                 },
    //                 {
    //                     "code": "14",
    //                     "name": "Kanagawa"
    //                 },
    //                 {
    //                     "code": "15",
    //                     "name": "Niigata"
    //                 },
    //                 {
    //                     "code": "16",
    //                     "name": "Toyama"
    //                 },
    //                 {
    //                     "code": "17",
    //                     "name": "Ishikawa"
    //                 },
    //                 {
    //                     "code": "18",
    //                     "name": "Fukui"
    //                 },
    //                 {
    //                     "code": "19",
    //                     "name": "Yamanashi"
    //                 },
    //                 {
    //                     "code": "50",
    //                     "name": "Nagano"
    //                 },
    //                 {
    //                     "code": "21",
    //                     "name": "Gifu"
    //                 },
    //                 {
    //                     "code": "22",
    //                     "name": "Shizuoka"
    //                 },
    //                 {
    //                     "code": "23",
    //                     "name": "Aichi"
    //                 },
    //                 {
    //                     "code": "24",
    //                     "name": "Mie"
    //                 },
    //                 {
    //                     "code": "25",
    //                     "name": "Shiga"
    //                 },
    //                 {
    //                     "code": "26",
    //                     "name": "Kyoto"
    //                 },
    //                 {
    //                     "code": "27",
    //                     "name": "Osaka"
    //                 },
    //                 {
    //                     "code": "28",
    //                     "name": "Hyogo"
    //                 },
    //                 {
    //                     "code": "29",
    //                     "name": "Nara"
    //                 },
    //                 {
    //                     "code": "30",
    //                     "name": "Wakayama"
    //                 },
    //                 {
    //                     "code": "31",
    //                     "name": "Tottori"
    //                 },
    //                 {
    //                     "code": "32",
    //                     "name": "Shimane"
    //                 },
    //                 {
    //                     "code": "33",
    //                     "name": "Okayama"
    //                 },
    //                 {
    //                     "code": "34",
    //                     "name": "Hiroshima"
    //                 },
    //                 {
    //                     "code": "35",
    //                     "name": "Yamaguchi"
    //                 },
    //                 {
    //                     "code": "36",
    //                     "name": "Tokushima"
    //                 },
    //                 {
    //                     "code": "37",
    //                     "name": "Kagawa"
    //                 },
    //                 {
    //                     "code": "38",
    //                     "name": "Ehime"
    //                 },
    //                 {
    //                     "code": "39",
    //                     "name": "Kochi"
    //                 },
    //                 {
    //                     "code": "40",
    //                     "name": "Fukuoka"
    //                 },
    //                 {
    //                     "code": "41",
    //                     "name": "Saga"
    //                 },
    //                 {
    //                     "code": "42",
    //                     "name": "Nagasaki"
    //                 },
    //                 {
    //                     "code": "43",
    //                     "name": "Kumamoto"
    //                 },
    //                 {
    //                     "code": "44",
    //                     "name": "Oita"
    //                 },
    //                 {
    //                     "code": "45",
    //                     "name": "Miyazaki"
    //                 },
    //                 {
    //                     "code": "46",
    //                     "name": "Kagoshima"
    //                 },
    //                 {
    //                     "code": "47",
    //                     "name": "Okinawa"
    //                 }
    //             ],
    //             "japan": true,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+81 (Japan)"
    //         },
    //         {
    //             "code": "JEY",
    //             "code2": "JE",
    //             "name": "Jersey",
    //             "dialCode": "44",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+44 (Jersey)"
    //         },
    //         {
    //             "code": "JOR",
    //             "code2": "JO",
    //             "name": "Jordan",
    //             "dialCode": "962",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+962 (Jordan)"
    //         },
    //         {
    //             "code": "KAZ",
    //             "code2": "KZ",
    //             "name": "Kazakhstan",
    //             "dialCode": "7",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+7 (Kazakhstan)"
    //         },
    //         {
    //             "code": "KEN",
    //             "code2": "KE",
    //             "name": "Kenya",
    //             "dialCode": "254",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+254 (Kenya)"
    //         },
    //         {
    //             "code": "KIR",
    //             "code2": "KI",
    //             "name": "Kiribati",
    //             "dialCode": "686",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+686 (Kiribati)"
    //         },
    //         {
    //             "code": "XKS",
    //             "code2": "XK",
    //             "name": "Kosovo",
    //             "dialCode": "383",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+383 (Kosovo)"
    //         },
    //         {
    //             "code": "KWT",
    //             "code2": "KW",
    //             "name": "Kuwait",
    //             "dialCode": "965",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+965 (Kuwait)"
    //         },
    //         {
    //             "code": "KGZ",
    //             "code2": "KG",
    //             "name": "Kyrgyzstan",
    //             "dialCode": "996",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+996 (Kyrgyzstan)"
    //         },
    //         {
    //             "code": "LAO",
    //             "code2": "LA",
    //             "name": "Laos",
    //             "dialCode": "856",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+856 (Laos)"
    //         },
    //         {
    //             "code": "LVA",
    //             "code2": "LV",
    //             "name": "Latvia",
    //             "dialCode": "371",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+371 (Latvia)"
    //         },
    //         {
    //             "code": "LBN",
    //             "code2": "LB",
    //             "name": "Lebanon",
    //             "dialCode": "961",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+961 (Lebanon)"
    //         },
    //         {
    //             "code": "LSO",
    //             "code2": "LS",
    //             "name": "Lesotho",
    //             "dialCode": "266",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+266 (Lesotho)"
    //         },
    //         {
    //             "code": "LBR",
    //             "code2": "LR",
    //             "name": "Liberia",
    //             "dialCode": "231",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+231 (Liberia)"
    //         },
    //         {
    //             "code": "LBY",
    //             "code2": "LY",
    //             "name": "Libya",
    //             "dialCode": "218",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+218 (Libya)"
    //         },
    //         {
    //             "code": "LIE",
    //             "code2": "LI",
    //             "name": "Liechtenstein",
    //             "dialCode": "423",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+423 (Liechtenstein)"
    //         },
    //         {
    //             "code": "LTU",
    //             "code2": "LT",
    //             "name": "Lithuania",
    //             "dialCode": "370",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+370 (Lithuania)"
    //         },
    //         {
    //             "code": "LUX",
    //             "code2": "LU",
    //             "name": "Luxembourg",
    //             "dialCode": "352",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+352 (Luxembourg)"
    //         },
    //         {
    //             "code": "MAC",
    //             "code2": "MO",
    //             "name": "Macao",
    //             "dialCode": "853",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+853 (Macao)"
    //         },
    //         {
    //             "code": "MDG",
    //             "code2": "MG",
    //             "name": "Madagascar",
    //             "dialCode": "261",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+261 (Madagascar)"
    //         },
    //         {
    //             "code": "MWI",
    //             "code2": "MW",
    //             "name": "Malawi",
    //             "dialCode": "265",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+265 (Malawi)"
    //         },
    //         {
    //             "code": "MYS",
    //             "code2": "MY",
    //             "name": "Malaysia",
    //             "dialCode": "60",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+60 (Malaysia)"
    //         },
    //         {
    //             "code": "MDV",
    //             "code2": "MV",
    //             "name": "Maldives",
    //             "dialCode": "960",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+960 (Maldives)"
    //         },
    //         {
    //             "code": "MLI",
    //             "code2": "ML",
    //             "name": "Mali",
    //             "dialCode": "223",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+223 (Mali)"
    //         },
    //         {
    //             "code": "MLT",
    //             "code2": "MT",
    //             "name": "Malta",
    //             "dialCode": "356",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+356 (Malta)"
    //         },
    //         {
    //             "code": "MHL",
    //             "code2": "MH",
    //             "name": "Marshall Islands",
    //             "dialCode": "692",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+692 (Marshall Islands)"
    //         },
    //         {
    //             "code": "MTQ",
    //             "code2": "MQ",
    //             "name": "Martinique",
    //             "dialCode": "596",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+596 (Martinique)"
    //         },
    //         {
    //             "code": "MRT",
    //             "code2": "MR",
    //             "name": "Mauritania",
    //             "dialCode": "222",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+222 (Mauritania)"
    //         },
    //         {
    //             "code": "MUS",
    //             "code2": "MU",
    //             "name": "Mauritius",
    //             "dialCode": "230",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+230 (Mauritius)"
    //         },
    //         {
    //             "code": "MYT",
    //             "code2": "YT",
    //             "name": "Mayotte",
    //             "dialCode": "262",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+262 (Mayotte)"
    //         },
    //         {
    //             "code": "MEX",
    //             "code2": "MX",
    //             "name": "Mexico",
    //             "dialCode": "52",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+52 (Mexico)"
    //         },
    //         {
    //             "code": "FSM",
    //             "code2": "FM",
    //             "name": "Micronesia",
    //             "dialCode": "691",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+691 (Micronesia)"
    //         },
    //         {
    //             "code": "MDA",
    //             "code2": "MD",
    //             "name": "Moldova",
    //             "dialCode": "373",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+373 (Moldova)"
    //         },
    //         {
    //             "code": "MCO",
    //             "code2": "MC",
    //             "name": "Monaco",
    //             "dialCode": "377",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+377 (Monaco)"
    //         },
    //         {
    //             "code": "MNG",
    //             "code2": "MN",
    //             "name": "Mongolia",
    //             "dialCode": "976",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+976 (Mongolia)"
    //         },
    //         {
    //             "code": "MNE",
    //             "code2": "ME",
    //             "name": "Montenegro",
    //             "dialCode": "382",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+382 (Montenegro)"
    //         },
    //         {
    //             "code": "MSR",
    //             "code2": "MS",
    //             "name": "Montserrat",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Montserrat)"
    //         },
    //         {
    //             "code": "MAR",
    //             "code2": "MA",
    //             "name": "Morocco",
    //             "dialCode": "212",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+212 (Morocco)"
    //         },
    //         {
    //             "code": "MOZ",
    //             "code2": "MZ",
    //             "name": "Mozambique",
    //             "dialCode": "258",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+258 (Mozambique)"
    //         },
    //         {
    //             "code": "MMR",
    //             "code2": "MM",
    //             "name": "Myanmar",
    //             "dialCode": "95",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+95 (Myanmar)"
    //         },
    //         {
    //             "code": "NAM",
    //             "code2": "NA",
    //             "name": "Namibia",
    //             "dialCode": "264",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+264 (Namibia)"
    //         },
    //         {
    //             "code": "NRU",
    //             "code2": "NR",
    //             "name": "Nauru",
    //             "dialCode": "674",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+674 (Nauru)"
    //         },
    //         {
    //             "code": "NPL",
    //             "code2": "NP",
    //             "name": "Nepal",
    //             "dialCode": "977",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+977 (Nepal)"
    //         },
    //         {
    //             "code": "NLD",
    //             "code2": "NL",
    //             "name": "Netherlands",
    //             "dialCode": "31",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+31 (Netherlands)"
    //         },
    //         {
    //             "code": "NCL",
    //             "code2": "NC",
    //             "name": "New Caledonia",
    //             "dialCode": "687",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+687 (New Caledonia)"
    //         },
    //         {
    //             "code": "NZL",
    //             "code2": "NZ",
    //             "name": "New Zealand",
    //             "dialCode": "64",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+64 (New Zealand)"
    //         },
    //         {
    //             "code": "NIC",
    //             "code2": "NI",
    //             "name": "Nicaragua",
    //             "dialCode": "505",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+505 (Nicaragua)"
    //         },
    //         {
    //             "code": "NER",
    //             "code2": "NE",
    //             "name": "Niger",
    //             "dialCode": "227",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+227 (Niger)"
    //         },
    //         {
    //             "code": "NGA",
    //             "code2": "NG",
    //             "name": "Nigeria",
    //             "dialCode": "234",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+234 (Nigeria)"
    //         },
    //         {
    //             "code": "NIU",
    //             "code2": "NU",
    //             "name": "Niue",
    //             "dialCode": "683",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+683 (Niue)"
    //         },
    //         {
    //             "code": "MNP",
    //             "code2": "MP",
    //             "name": "Northern Mariana Islands",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Northern Mariana Islands)"
    //         },
    //         {
    //             "code": "MKD",
    //             "code2": "MK",
    //             "name": "North Macedonia",
    //             "dialCode": "389",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+389 (North Macedonia)"
    //         },
    //         {
    //             "code": "NOR",
    //             "code2": "NO",
    //             "name": "Norway",
    //             "dialCode": "47",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+47 (Norway)"
    //         },
    //         {
    //             "code": "OMN",
    //             "code2": "OM",
    //             "name": "Oman",
    //             "dialCode": "968",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+968 (Oman)"
    //         },
    //         {
    //             "code": "PAK",
    //             "code2": "PK",
    //             "name": "Pakistan",
    //             "dialCode": "92",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+92 (Pakistan)"
    //         },
    //         {
    //             "code": "PLW",
    //             "code2": "PW",
    //             "name": "Palau",
    //             "dialCode": "680",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+680 (Palau)"
    //         },
    //         {
    //             "code": "PSE",
    //             "code2": "PS",
    //             "name": "Palestinian Territories",
    //             "dialCode": "970",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+970 (Palestinian Territories)"
    //         },
    //         {
    //             "code": "PAN",
    //             "code2": "PA",
    //             "name": "Panama",
    //             "dialCode": "507",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+507 (Panama)"
    //         },
    //         {
    //             "code": "PNG",
    //             "code2": "PG",
    //             "name": "Papua New Guinea",
    //             "dialCode": "675",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+675 (Papua New Guinea)"
    //         },
    //         {
    //             "code": "PRY",
    //             "code2": "PY",
    //             "name": "Paraguay",
    //             "dialCode": "595",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+595 (Paraguay)"
    //         },
    //         {
    //             "code": "PER",
    //             "code2": "PE",
    //             "name": "Peru",
    //             "dialCode": "51",
    //             "embargoed": false,
    //             "underAgeLimit": 15,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+51 (Peru)"
    //         },
    //         {
    //             "code": "PHL",
    //             "code2": "PH",
    //             "name": "Philippines",
    //             "dialCode": "63",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+63 (Philippines)"
    //         },
    //         {
    //             "code": "PCN",
    //             "code2": "PN",
    //             "name": "Pitcairn",
    //             "dialCode": "870",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+870 (Pitcairn)"
    //         },
    //         {
    //             "code": "POL",
    //             "code2": "PL",
    //             "name": "Poland",
    //             "dialCode": "48",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+48 (Poland)"
    //         },
    //         {
    //             "code": "PRT",
    //             "code2": "PT",
    //             "name": "Portugal",
    //             "dialCode": "351",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+351 (Portugal)"
    //         },
    //         {
    //             "code": "PRI",
    //             "code2": "PR",
    //             "name": "Puerto Rico",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Puerto Rico)"
    //         },
    //         {
    //             "code": "QAT",
    //             "code2": "QA",
    //             "name": "Qatar",
    //             "dialCode": "974",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+974 (Qatar)"
    //         },
    //         {
    //             "code": "COG",
    //             "code2": "CG",
    //             "name": "Republic of the Congo",
    //             "dialCode": "242",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+242 (Republic of the Congo)"
    //         },
    //         {
    //             "code": "REU",
    //             "code2": "RE",
    //             "name": "Réunion",
    //             "dialCode": "262",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+262 (Réunion)"
    //         },
    //         {
    //             "code": "ROU",
    //             "code2": "RO",
    //             "name": "Romania",
    //             "dialCode": "40",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+40 (Romania)"
    //         },
    //         {
    //             "code": "RUS",
    //             "code2": "RU",
    //             "name": "Russia",
    //             "dialCode": "7",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+7 (Russia)"
    //         },
    //         {
    //             "code": "RWA",
    //             "code2": "RW",
    //             "name": "Rwanda",
    //             "dialCode": "250",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+250 (Rwanda)"
    //         },
    //         {
    //             "code": "BLM",
    //             "code2": "BL",
    //             "name": "Saint Barthélemy",
    //             "dialCode": "590",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+590 (Saint Barthélemy)"
    //         },
    //         {
    //             "code": "SHN",
    //             "code2": "SH",
    //             "name": "Saint Helena",
    //             "dialCode": "290",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+290 (Saint Helena)"
    //         },
    //         {
    //             "code": "KNA",
    //             "code2": "KN",
    //             "name": "Saint Kitts And Nevis",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "KNA",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "KN"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Saint Kitts And Nevis)"
    //         },
    //         {
    //             "code": "LCA",
    //             "code2": "LC",
    //             "name": "Saint Lucia",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "LCA",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "LC"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Saint Lucia)"
    //         },
    //         {
    //             "code": "MAF",
    //             "code2": "MF",
    //             "name": "Saint Martin",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Saint Martin)"
    //         },
    //         {
    //             "code": "VCT",
    //             "code2": "VC",
    //             "name": "Saint Vincent and the Grenadines",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "VCT",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "VC"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Saint Vincent and the Grenadines)"
    //         },
    //         {
    //             "code": "WSM",
    //             "code2": "WS",
    //             "name": "Samoa",
    //             "dialCode": "685",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+685 (Samoa)"
    //         },
    //         {
    //             "code": "SMR",
    //             "code2": "SM",
    //             "name": "San Marino",
    //             "dialCode": "378",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+378 (San Marino)"
    //         },
    //         {
    //             "code": "STP",
    //             "code2": "ST",
    //             "name": "Sao Tome And Principe",
    //             "dialCode": "239",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+239 (Sao Tome And Principe)"
    //         },
    //         {
    //             "code": "SAU",
    //             "code2": "SA",
    //             "name": "Saudi Arabia",
    //             "dialCode": "966",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxxxxxxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     9
    //                 ],
    //                 "minDigitLength": 9,
    //                 "maxDigitLength": 9,
    //                 "countryCode": "SAU",
    //                 "countryDialCode": "966",
    //                 "countryCode2": "SA"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+966 (Saudi Arabia)"
    //         },
    //         {
    //             "code": "SEN",
    //             "code2": "SN",
    //             "name": "Senegal",
    //             "dialCode": "221",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+221 (Senegal)"
    //         },
    //         {
    //             "code": "SRB",
    //             "code2": "RS",
    //             "name": "Serbia",
    //             "dialCode": "381",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+381 (Serbia)"
    //         },
    //         {
    //             "code": "SYC",
    //             "code2": "SC",
    //             "name": "Seychelles",
    //             "dialCode": "248",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+248 (Seychelles)"
    //         },
    //         {
    //             "code": "SLE",
    //             "code2": "SL",
    //             "name": "Sierra Leone",
    //             "dialCode": "232",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+232 (Sierra Leone)"
    //         },
    //         {
    //             "code": "SGP",
    //             "code2": "SG",
    //             "name": "Singapore",
    //             "dialCode": "65",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+65 (Singapore)"
    //         },
    //         {
    //             "code": "SXM",
    //             "code2": "SX",
    //             "name": "Sint Maarten",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Sint Maarten)"
    //         },
    //         {
    //             "code": "SVK",
    //             "code2": "SK",
    //             "name": "Slovakia",
    //             "dialCode": "421",
    //             "embargoed": false,
    //             "underAgeLimit": 16,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+421 (Slovakia)"
    //         },
    //         {
    //             "code": "SVN",
    //             "code2": "SI",
    //             "name": "Slovenia",
    //             "dialCode": "386",
    //             "embargoed": false,
    //             "underAgeLimit": 15,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+386 (Slovenia)"
    //         },
    //         {
    //             "code": "SLB",
    //             "code2": "SB",
    //             "name": "Solomon Islands",
    //             "dialCode": "677",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+677 (Solomon Islands)"
    //         },
    //         {
    //             "code": "SOM",
    //             "code2": "SO",
    //             "name": "Somalia",
    //             "dialCode": "252",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+252 (Somalia)"
    //         },
    //         {
    //             "code": "ZAF",
    //             "code2": "ZA",
    //             "name": "South Africa",
    //             "dialCode": "27",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+27 (South Africa)"
    //         },
    //         {
    //             "code": "KOR",
    //             "code2": "KR",
    //             "name": "South Korea",
    //             "dialCode": "82",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 19,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": true,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+82 (South Korea)"
    //         },
    //         {
    //             "code": "SSD",
    //             "code2": "SS",
    //             "name": "South Sudan",
    //             "dialCode": "211",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+211 (South Sudan)"
    //         },
    //         {
    //             "code": "ESP",
    //             "code2": "ES",
    //             "name": "Spain",
    //             "dialCode": "34",
    //             "embargoed": false,
    //             "underAgeLimit": 14,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx xxx xxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     7,
    //                     8,
    //                     11
    //                 ],
    //                 "minDigitLength": 9,
    //                 "maxDigitLength": 9,
    //                 "countryCode": "ESP",
    //                 "countryDialCode": "34",
    //                 "countryCode2": "ES"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+34 (Spain)"
    //         },
    //         {
    //             "code": "LKA",
    //             "code2": "LK",
    //             "name": "Sri Lanka",
    //             "dialCode": "94",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+94 (Sri Lanka)"
    //         },
    //         {
    //             "code": "SPM",
    //             "code2": "PM",
    //             "name": "St. Pierre And Miquelon",
    //             "dialCode": "508",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+508 (St. Pierre And Miquelon)"
    //         },
    //         {
    //             "code": "SDN",
    //             "code2": "SD",
    //             "name": "Sudan",
    //             "dialCode": "249",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+249 (Sudan)"
    //         },
    //         {
    //             "code": "SUR",
    //             "code2": "SR",
    //             "name": "Suriname",
    //             "dialCode": "597",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+597 (Suriname)"
    //         },
    //         {
    //             "code": "SJM",
    //             "code2": "SJ",
    //             "name": "Svalbard And Jan Mayen Islands",
    //             "dialCode": "47",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+47 (Svalbard And Jan Mayen Islands)"
    //         },
    //         {
    //             "code": "SWE",
    //             "code2": "SE",
    //             "name": "Sweden",
    //             "dialCode": "46",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+46 (Sweden)"
    //         },
    //         {
    //             "code": "CHE",
    //             "code2": "CH",
    //             "name": "Switzerland",
    //             "dialCode": "41",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx xxx xx xx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     7,
    //                     8,
    //                     10,
    //                     11,
    //                     13
    //                 ],
    //                 "minDigitLength": 1,
    //                 "maxDigitLength": 10,
    //                 "countryCode": "CHE",
    //                 "countryDialCode": "41",
    //                 "countryCode2": "CH"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+41 (Switzerland)"
    //         },
    //         {
    //             "code": "TWN",
    //             "code2": "TW",
    //             "name": "Taiwan",
    //             "dialCode": "886",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+886 (Taiwan)"
    //         },
    //         {
    //             "code": "TJK",
    //             "code2": "TJ",
    //             "name": "Tajikistan",
    //             "dialCode": "992",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+992 (Tajikistan)"
    //         },
    //         {
    //             "code": "TZA",
    //             "code2": "TZ",
    //             "name": "Tanzania",
    //             "dialCode": "255",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+255 (Tanzania)"
    //         },
    //         {
    //             "code": "THA",
    //             "code2": "TH",
    //             "name": "Thailand",
    //             "dialCode": "66",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 20,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+66 (Thailand)"
    //         },
    //         {
    //             "code": "TLS",
    //             "code2": "TL",
    //             "name": "Timor-Leste",
    //             "dialCode": "670",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+670 (Timor-Leste)"
    //         },
    //         {
    //             "code": "TGO",
    //             "code2": "TG",
    //             "name": "Togo",
    //             "dialCode": "228",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+228 (Togo)"
    //         },
    //         {
    //             "code": "TKL",
    //             "code2": "TK",
    //             "name": "Tokelau",
    //             "dialCode": "690",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+690 (Tokelau)"
    //         },
    //         {
    //             "code": "TON",
    //             "code2": "TO",
    //             "name": "Tonga",
    //             "dialCode": "676",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+676 (Tonga)"
    //         },
    //         {
    //             "code": "TTO",
    //             "code2": "TT",
    //             "name": "Trinidad and Tobago",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "TTO",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "TT"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Trinidad and Tobago)"
    //         },
    //         {
    //             "code": "TUN",
    //             "code2": "TN",
    //             "name": "Tunisia",
    //             "dialCode": "216",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+216 (Tunisia)"
    //         },
    //         {
    //             "code": "TUR",
    //             "code2": "TR",
    //             "name": "Türkiye",
    //             "dialCode": "90",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+90 (Türkiye)"
    //         },
    //         {
    //             "code": "TKM",
    //             "code2": "TM",
    //             "name": "Turkmenistan",
    //             "dialCode": "993",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+993 (Turkmenistan)"
    //         },
    //         {
    //             "code": "TCA",
    //             "code2": "TC",
    //             "name": "Turks and Caicos Islands",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     0,
    //                     3,
    //                     4,
    //                     8
    //                 ],
    //                 "minDigitLength": 7,
    //                 "maxDigitLength": 7,
    //                 "countryCode": "TCA",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "TC"
    //             },
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Turks and Caicos Islands)"
    //         },
    //         {
    //             "code": "TUV",
    //             "code2": "TV",
    //             "name": "Tuvalu",
    //             "dialCode": "688",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+688 (Tuvalu)"
    //         },
    //         {
    //             "code": "UGA",
    //             "code2": "UG",
    //             "name": "Uganda",
    //             "dialCode": "256",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+256 (Uganda)"
    //         },
    //         {
    //             "code": "UKR",
    //             "code2": "UA",
    //             "name": "Ukraine",
    //             "dialCode": "380",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+380 (Ukraine)"
    //         },
    //         {
    //             "code": "ARE",
    //             "code2": "AE",
    //             "name": "United Arab Emirates",
    //             "dialCode": "971",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 21,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+971 (United Arab Emirates)"
    //         },
    //         {
    //             "code": "GBR",
    //             "code2": "GB",
    //             "name": "United Kingdom",
    //             "dialCode": "44",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": true,
    //             "dialCodeDisplay": "+44 (United Kingdom)"
    //         },
    //         {
    //             "code": "USA",
    //             "code2": "US",
    //             "name": "United States",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "phoneNumberFormat": {
    //                 "format": "(xxx) xxx-xxxx",
    //                 "formatDigitRegions": [
    //                     1,
    //                     4,
    //                     6,
    //                     9,
    //                     10,
    //                     14
    //                 ],
    //                 "minDigitLength": 10,
    //                 "maxDigitLength": 10,
    //                 "countryCode": "USA",
    //                 "countryDialCode": "1",
    //                 "countryCode2": "US"
    //             },
    //             "supportPaidAccount": false,
    //             "stateProvinces": [
    //                 {
    //                     "code": "AL",
    //                     "name": "Alabama"
    //                 },
    //                 {
    //                     "code": "AK",
    //                     "name": "Alaska"
    //                 },
    //                 {
    //                     "code": "AZ",
    //                     "name": "Arizona"
    //                 },
    //                 {
    //                     "code": "AR",
    //                     "name": "Arkansas"
    //                 },
    //                 {
    //                     "code": "AA",
    //                     "name": "Armed Forces Americas"
    //                 },
    //                 {
    //                     "code": "AE",
    //                     "name": "Armed Forces Europe"
    //                 },
    //                 {
    //                     "code": "AP",
    //                     "name": "Armed Forces Pacific"
    //                 },
    //                 {
    //                     "code": "CA",
    //                     "name": "California"
    //                 },
    //                 {
    //                     "code": "CO",
    //                     "name": "Colorado"
    //                 },
    //                 {
    //                     "code": "CT",
    //                     "name": "Connecticut"
    //                 },
    //                 {
    //                     "code": "DC",
    //                     "name": "Dist Of Columbia"
    //                 },
    //                 {
    //                     "code": "DE",
    //                     "name": "Delaware"
    //                 },
    //                 {
    //                     "code": "FL",
    //                     "name": "Florida"
    //                 },
    //                 {
    //                     "code": "GA",
    //                     "name": "Georgia"
    //                 },
    //                 {
    //                     "code": "GU",
    //                     "name": "Guam"
    //                 },
    //                 {
    //                     "code": "HI",
    //                     "name": "Hawaii"
    //                 },
    //                 {
    //                     "code": "IA",
    //                     "name": "Iowa"
    //                 },
    //                 {
    //                     "code": "ID",
    //                     "name": "Idaho"
    //                 },
    //                 {
    //                     "code": "IL",
    //                     "name": "Illinois"
    //                 },
    //                 {
    //                     "code": "IN",
    //                     "name": "Indiana"
    //                 },
    //                 {
    //                     "code": "KS",
    //                     "name": "Kansas"
    //                 },
    //                 {
    //                     "code": "KY",
    //                     "name": "Kentucky"
    //                 },
    //                 {
    //                     "code": "LA",
    //                     "name": "Louisiana"
    //                 },
    //                 {
    //                     "code": "MA",
    //                     "name": "Massachusetts"
    //                 },
    //                 {
    //                     "code": "MD",
    //                     "name": "Maryland"
    //                 },
    //                 {
    //                     "code": "ME",
    //                     "name": "Maine"
    //                 },
    //                 {
    //                     "code": "MI",
    //                     "name": "Michigan"
    //                 },
    //                 {
    //                     "code": "MN",
    //                     "name": "Minnesota"
    //                 },
    //                 {
    //                     "code": "MO",
    //                     "name": "Missouri"
    //                 },
    //                 {
    //                     "code": "MS",
    //                     "name": "Mississippi"
    //                 },
    //                 {
    //                     "code": "MT",
    //                     "name": "Montana"
    //                 },
    //                 {
    //                     "code": "NC",
    //                     "name": "North Carolina"
    //                 },
    //                 {
    //                     "code": "ND",
    //                     "name": "North Dakota"
    //                 },
    //                 {
    //                     "code": "NE",
    //                     "name": "Nebraska"
    //                 },
    //                 {
    //                     "code": "NH",
    //                     "name": "New Hampshire"
    //                 },
    //                 {
    //                     "code": "NJ",
    //                     "name": "New Jersey"
    //                 },
    //                 {
    //                     "code": "NM",
    //                     "name": "New Mexico"
    //                 },
    //                 {
    //                     "code": "NV",
    //                     "name": "Nevada"
    //                 },
    //                 {
    //                     "code": "NY",
    //                     "name": "New York"
    //                 },
    //                 {
    //                     "code": "OH",
    //                     "name": "Ohio"
    //                 },
    //                 {
    //                     "code": "OK",
    //                     "name": "Oklahoma"
    //                 },
    //                 {
    //                     "code": "OR",
    //                     "name": "Oregon"
    //                 },
    //                 {
    //                     "code": "PA",
    //                     "name": "Pennsylvania"
    //                 },
    //                 {
    //                     "code": "PR",
    //                     "name": "Puerto Rico"
    //                 },
    //                 {
    //                     "code": "RI",
    //                     "name": "Rhode Island"
    //                 },
    //                 {
    //                     "code": "SC",
    //                     "name": "South Carolina"
    //                 },
    //                 {
    //                     "code": "SD",
    //                     "name": "South Dakota"
    //                 },
    //                 {
    //                     "code": "TN",
    //                     "name": "Tennessee"
    //                 },
    //                 {
    //                     "code": "TX",
    //                     "name": "Texas"
    //                 },
    //                 {
    //                     "code": "UT",
    //                     "name": "Utah"
    //                 },
    //                 {
    //                     "code": "VA",
    //                     "name": "Virginia"
    //                 },
    //                 {
    //                     "code": "VI",
    //                     "name": "Virgin Islands"
    //                 },
    //                 {
    //                     "code": "VT",
    //                     "name": "Vermont"
    //                 },
    //                 {
    //                     "code": "WA",
    //                     "name": "Washington"
    //                 },
    //                 {
    //                     "code": "WI",
    //                     "name": "Wisconsin"
    //                 },
    //                 {
    //                     "code": "WV",
    //                     "name": "West Virginia"
    //                 },
    //                 {
    //                     "code": "WY",
    //                     "name": "Wyoming"
    //                 }
    //             ],
    //             "japan": false,
    //             "korea": false,
    //             "usa": true,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (United States)"
    //         },
    //         {
    //             "code": "URY",
    //             "code2": "UY",
    //             "name": "Uruguay",
    //             "dialCode": "598",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+598 (Uruguay)"
    //         },
    //         {
    //             "code": "UZB",
    //             "code2": "UZ",
    //             "name": "Uzbekistan",
    //             "dialCode": "998",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+998 (Uzbekistan)"
    //         },
    //         {
    //             "code": "VUT",
    //             "code2": "VU",
    //             "name": "Vanuatu",
    //             "dialCode": "678",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+678 (Vanuatu)"
    //         },
    //         {
    //             "code": "VAT",
    //             "code2": "VA",
    //             "name": "Vatican",
    //             "dialCode": "39",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+39 (Vatican)"
    //         },
    //         {
    //             "code": "VEN",
    //             "code2": "VE",
    //             "name": "Venezuela",
    //             "dialCode": "58",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+58 (Venezuela)"
    //         },
    //         {
    //             "code": "VNM",
    //             "code2": "VN",
    //             "name": "Vietnam",
    //             "dialCode": "84",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+84 (Vietnam)"
    //         },
    //         {
    //             "code": "VIR",
    //             "code2": "VI",
    //             "name": "Virgin Islands (U.S.)",
    //             "dialCode": "1",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+1 (Virgin Islands (U.S.))"
    //         },
    //         {
    //             "code": "WLF",
    //             "code2": "WF",
    //             "name": "Wallis And Futuna Islands",
    //             "dialCode": "681",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+681 (Wallis And Futuna Islands)"
    //         },
    //         {
    //             "code": "ESH",
    //             "code2": "EH",
    //             "name": "Western Sahara",
    //             "dialCode": "212",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+212 (Western Sahara)"
    //         },
    //         {
    //             "code": "YEM",
    //             "code2": "YE",
    //             "name": "Yemen",
    //             "dialCode": "967",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+967 (Yemen)"
    //         },
    //         {
    //             "code": "ZMB",
    //             "code2": "ZM",
    //             "name": "Zambia",
    //             "dialCode": "260",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+260 (Zambia)"
    //         },
    //         {
    //             "code": "ZWE",
    //             "code2": "ZW",
    //             "name": "Zimbabwe",
    //             "dialCode": "263",
    //             "embargoed": false,
    //             "underAgeLimit": 13,
    //             "minorAgeLimit": 18,
    //             "supportHSA2": true,
    //             "supportPaidAccount": false,
    //             "japan": false,
    //             "korea": false,
    //             "usa": false,
    //             "canada": false,
    //             "uk": false,
    //             "dialCodeDisplay": "+263 (Zimbabwe)"
    //         }
    //     ],
    //     "regionCountry": {
    //         "code": "USA",
    //         "code2": "US",
    //         "name": "United States",
    //         "dialCode": "1",
    //         "embargoed": false,
    //         "underAgeLimit": 13,
    //         "minorAgeLimit": 18,
    //         "supportHSA2": true,
    //         "phoneNumberFormat": {
    //             "format": "(xxx) xxx-xxxx",
    //             "formatDigitRegions": [
    //                 1,
    //                 4,
    //                 6,
    //                 9,
    //                 10,
    //                 14
    //             ],
    //             "minDigitLength": 10,
    //             "maxDigitLength": 10,
    //             "countryCode": "USA",
    //             "countryDialCode": "1",
    //             "countryCode2": "US"
    //         },
    //         "supportPaidAccount": false,
    //         "stateProvinces": [
    //             {
    //                 "code": "AL",
    //                 "name": "Alabama"
    //             },
    //             {
    //                 "code": "AK",
    //                 "name": "Alaska"
    //             },
    //             {
    //                 "code": "AZ",
    //                 "name": "Arizona"
    //             },
    //             {
    //                 "code": "AR",
    //                 "name": "Arkansas"
    //             },
    //             {
    //                 "code": "AA",
    //                 "name": "Armed Forces Americas"
    //             },
    //             {
    //                 "code": "AE",
    //                 "name": "Armed Forces Europe"
    //             },
    //             {
    //                 "code": "AP",
    //                 "name": "Armed Forces Pacific"
    //             },
    //             {
    //                 "code": "CA",
    //                 "name": "California"
    //             },
    //             {
    //                 "code": "CO",
    //                 "name": "Colorado"
    //             },
    //             {
    //                 "code": "CT",
    //                 "name": "Connecticut"
    //             },
    //             {
    //                 "code": "DC",
    //                 "name": "Dist Of Columbia"
    //             },
    //             {
    //                 "code": "DE",
    //                 "name": "Delaware"
    //             },
    //             {
    //                 "code": "FL",
    //                 "name": "Florida"
    //             },
    //             {
    //                 "code": "GA",
    //                 "name": "Georgia"
    //             },
    //             {
    //                 "code": "GU",
    //                 "name": "Guam"
    //             },
    //             {
    //                 "code": "HI",
    //                 "name": "Hawaii"
    //             },
    //             {
    //                 "code": "IA",
    //                 "name": "Iowa"
    //             },
    //             {
    //                 "code": "ID",
    //                 "name": "Idaho"
    //             },
    //             {
    //                 "code": "IL",
    //                 "name": "Illinois"
    //             },
    //             {
    //                 "code": "IN",
    //                 "name": "Indiana"
    //             },
    //             {
    //                 "code": "KS",
    //                 "name": "Kansas"
    //             },
    //             {
    //                 "code": "KY",
    //                 "name": "Kentucky"
    //             },
    //             {
    //                 "code": "LA",
    //                 "name": "Louisiana"
    //             },
    //             {
    //                 "code": "MA",
    //                 "name": "Massachusetts"
    //             },
    //             {
    //                 "code": "MD",
    //                 "name": "Maryland"
    //             },
    //             {
    //                 "code": "ME",
    //                 "name": "Maine"
    //             },
    //             {
    //                 "code": "MI",
    //                 "name": "Michigan"
    //             },
    //             {
    //                 "code": "MN",
    //                 "name": "Minnesota"
    //             },
    //             {
    //                 "code": "MO",
    //                 "name": "Missouri"
    //             },
    //             {
    //                 "code": "MS",
    //                 "name": "Mississippi"
    //             },
    //             {
    //                 "code": "MT",
    //                 "name": "Montana"
    //             },
    //             {
    //                 "code": "NC",
    //                 "name": "North Carolina"
    //             },
    //             {
    //                 "code": "ND",
    //                 "name": "North Dakota"
    //             },
    //             {
    //                 "code": "NE",
    //                 "name": "Nebraska"
    //             },
    //             {
    //                 "code": "NH",
    //                 "name": "New Hampshire"
    //             },
    //             {
    //                 "code": "NJ",
    //                 "name": "New Jersey"
    //             },
    //             {
    //                 "code": "NM",
    //                 "name": "New Mexico"
    //             },
    //             {
    //                 "code": "NV",
    //                 "name": "Nevada"
    //             },
    //             {
    //                 "code": "NY",
    //                 "name": "New York"
    //             },
    //             {
    //                 "code": "OH",
    //                 "name": "Ohio"
    //             },
    //             {
    //                 "code": "OK",
    //                 "name": "Oklahoma"
    //             },
    //             {
    //                 "code": "OR",
    //                 "name": "Oregon"
    //             },
    //             {
    //                 "code": "PA",
    //                 "name": "Pennsylvania"
    //             },
    //             {
    //                 "code": "PR",
    //                 "name": "Puerto Rico"
    //             },
    //             {
    //                 "code": "RI",
    //                 "name": "Rhode Island"
    //             },
    //             {
    //                 "code": "SC",
    //                 "name": "South Carolina"
    //             },
    //             {
    //                 "code": "SD",
    //                 "name": "South Dakota"
    //             },
    //             {
    //                 "code": "TN",
    //                 "name": "Tennessee"
    //             },
    //             {
    //                 "code": "TX",
    //                 "name": "Texas"
    //             },
    //             {
    //                 "code": "UT",
    //                 "name": "Utah"
    //             },
    //             {
    //                 "code": "VA",
    //                 "name": "Virginia"
    //             },
    //             {
    //                 "code": "VI",
    //                 "name": "Virgin Islands"
    //             },
    //             {
    //                 "code": "VT",
    //                 "name": "Vermont"
    //             },
    //             {
    //                 "code": "WA",
    //                 "name": "Washington"
    //             },
    //             {
    //                 "code": "WI",
    //                 "name": "Wisconsin"
    //             },
    //             {
    //                 "code": "WV",
    //                 "name": "West Virginia"
    //             },
    //             {
    //                 "code": "WY",
    //                 "name": "Wyoming"
    //             }
    //         ],
    //         "japan": false,
    //         "korea": false,
    //         "usa": true,
    //         "canada": false,
    //         "uk": false,
    //         "dialCodeDisplay": "+1 (United States)"
    //     },
    //     "recycledDomains": [
    //         "docomo.ne.jp",
    //         "mopera.net",
    //         "softbank.ne.jp",
    //         "vodafone.ne.jp",
    //         "disney.ne.jp",
    //         "i.softbank.jp",
    //         "ezweb.ne.jp",
    //         "biz.ezweb.ne.jp",
    //         "ido.ne.jp",
    //         "emnet.ne.jp",
    //         "emobile.ne.jp",
    //         "pdx.ne.jp",
    //         "willcom.com",
    //         "wcm.ne.jp",
    //         "139.com",
    //         "wo.com.cn",
    //         "189.cn"
    //     ],
    //     "dateLayout": "monthdayyear",
    //     "requiredSteps": [
    //         "phoneNumber",
    //         "phoneNumberVerification",
    //         "privacyConsent"
    //     ],
    //     "completedSteps": [
    //         "phoneNumber"
    //     ],
    //     "currentSteps": [
    //         "phoneNumber"
    //     ],
    //     "familySharingKBArticleLink": "https://support.apple.com/HT201084",
    //     "ageLimits": {
    //         "underAge": 13,
    //         "minorAge": 18
    //     },
    //     "appleIDLink": "https://appleid.apple.com",
    //     "appleIDLinkHostName": "appleid.apple.com",
    //     "clientShouldSetPasscode": false,
    //     "passcodeNudgeDeclined": false,
    //     "nonFTEUEnabled": false,
    //     "clientFeatures": {
    //         "restrictChildAccountCreation": false,
    //         "deviceTypeAgeRestrictionRequired": false,
    //         "cfucapable": false
    //     },
    //     "autoGenerateAccountName": false,
    //     "groupChildTerms": false,
    //     "makoUpgrade": false,
    //     "allowOnlyAcceptingPrivacyConsent": false,
    //     "privacyConsentEffectiveDateInPast": false,
    //     "repairContext": {
    //         "repairType": "restricted_account_conversion",
    //         "repairItems": [
    //             "phoneNumber",
    //             "privacyConsent"
    //         ],
    //         "makoUpgrade": false,
    //         "gcaccountConversion": false,
    //         "maidaccountConversion": false,
    //         "convertAccount": true,
    //         "privacyConsentRepairRequired": false,
    //         "accountReclaim": false,
    //         "inlineMaidAccountConversion": false,
    //         "restrictedAccountConversion": true,
    //         "edprecoveryTokenRepairRequired": false,
    //         "crossBorderPrivacyConsentRepairRequired": false,
    //         "adiToAspPrivacyConsentRepairRequired": false,
    //         "accountConversion": true,
    //         "accountCreateConversion": false,
    //         "phoneNumberRepair": false
    //     },
    //     "existingAccount": {
    //         "name": "mctaresheeche878453@gmail.com",
    //         "formattedAccountName": "mctaresheeche878453@gmail.com",
    //         "namePrefix": "mctaresheeche878453",
    //         "nameSuffix": "@gmail.com",
    //         "person": {
    //             "primaryAddress": {
    //                 "defaultAddress": false,
    //                 "stateProvinceInvalid": true,
    //                 "japanese": false,
    //                 "korean": false,
    //                 "formattedAddress": [
    //                     "United States"
    //                 ],
    //                 "primary": true,
    //                 "shipping": false,
    //                 "countryCode": "USA",
    //                 "countryName": "United States",
    //                 "stateProvinces": [
    //                     {
    //                         "code": "AL",
    //                         "name": "Alabama"
    //                     },
    //                     {
    //                         "code": "AK",
    //                         "name": "Alaska"
    //                     },
    //                     {
    //                         "code": "AZ",
    //                         "name": "Arizona"
    //                     },
    //                     {
    //                         "code": "AR",
    //                         "name": "Arkansas"
    //                     },
    //                     {
    //                         "code": "AA",
    //                         "name": "Armed Forces Americas"
    //                     },
    //                     {
    //                         "code": "AE",
    //                         "name": "Armed Forces Europe"
    //                     },
    //                     {
    //                         "code": "AP",
    //                         "name": "Armed Forces Pacific"
    //                     },
    //                     {
    //                         "code": "CA",
    //                         "name": "California"
    //                     },
    //                     {
    //                         "code": "CO",
    //                         "name": "Colorado"
    //                     },
    //                     {
    //                         "code": "CT",
    //                         "name": "Connecticut"
    //                     },
    //                     {
    //                         "code": "DC",
    //                         "name": "Dist Of Columbia"
    //                     },
    //                     {
    //                         "code": "DE",
    //                         "name": "Delaware"
    //                     },
    //                     {
    //                         "code": "FL",
    //                         "name": "Florida"
    //                     },
    //                     {
    //                         "code": "GA",
    //                         "name": "Georgia"
    //                     },
    //                     {
    //                         "code": "GU",
    //                         "name": "Guam"
    //                     },
    //                     {
    //                         "code": "HI",
    //                         "name": "Hawaii"
    //                     },
    //                     {
    //                         "code": "IA",
    //                         "name": "Iowa"
    //                     },
    //                     {
    //                         "code": "ID",
    //                         "name": "Idaho"
    //                     },
    //                     {
    //                         "code": "IL",
    //                         "name": "Illinois"
    //                     },
    //                     {
    //                         "code": "IN",
    //                         "name": "Indiana"
    //                     },
    //                     {
    //                         "code": "KS",
    //                         "name": "Kansas"
    //                     },
    //                     {
    //                         "code": "KY",
    //                         "name": "Kentucky"
    //                     },
    //                     {
    //                         "code": "LA",
    //                         "name": "Louisiana"
    //                     },
    //                     {
    //                         "code": "MA",
    //                         "name": "Massachusetts"
    //                     },
    //                     {
    //                         "code": "MD",
    //                         "name": "Maryland"
    //                     },
    //                     {
    //                         "code": "ME",
    //                         "name": "Maine"
    //                     },
    //                     {
    //                         "code": "MI",
    //                         "name": "Michigan"
    //                     },
    //                     {
    //                         "code": "MN",
    //                         "name": "Minnesota"
    //                     },
    //                     {
    //                         "code": "MO",
    //                         "name": "Missouri"
    //                     },
    //                     {
    //                         "code": "MS",
    //                         "name": "Mississippi"
    //                     },
    //                     {
    //                         "code": "MT",
    //                         "name": "Montana"
    //                     },
    //                     {
    //                         "code": "NC",
    //                         "name": "North Carolina"
    //                     },
    //                     {
    //                         "code": "ND",
    //                         "name": "North Dakota"
    //                     },
    //                     {
    //                         "code": "NE",
    //                         "name": "Nebraska"
    //                     },
    //                     {
    //                         "code": "NH",
    //                         "name": "New Hampshire"
    //                     },
    //                     {
    //                         "code": "NJ",
    //                         "name": "New Jersey"
    //                     },
    //                     {
    //                         "code": "NM",
    //                         "name": "New Mexico"
    //                     },
    //                     {
    //                         "code": "NV",
    //                         "name": "Nevada"
    //                     },
    //                     {
    //                         "code": "NY",
    //                         "name": "New York"
    //                     },
    //                     {
    //                         "code": "OH",
    //                         "name": "Ohio"
    //                     },
    //                     {
    //                         "code": "OK",
    //                         "name": "Oklahoma"
    //                     },
    //                     {
    //                         "code": "OR",
    //                         "name": "Oregon"
    //                     },
    //                     {
    //                         "code": "PA",
    //                         "name": "Pennsylvania"
    //                     },
    //                     {
    //                         "code": "PR",
    //                         "name": "Puerto Rico"
    //                     },
    //                     {
    //                         "code": "RI",
    //                         "name": "Rhode Island"
    //                     },
    //                     {
    //                         "code": "SC",
    //                         "name": "South Carolina"
    //                     },
    //                     {
    //                         "code": "SD",
    //                         "name": "South Dakota"
    //                     },
    //                     {
    //                         "code": "TN",
    //                         "name": "Tennessee"
    //                     },
    //                     {
    //                         "code": "TX",
    //                         "name": "Texas"
    //                     },
    //                     {
    //                         "code": "UT",
    //                         "name": "Utah"
    //                     },
    //                     {
    //                         "code": "VA",
    //                         "name": "Virginia"
    //                     },
    //                     {
    //                         "code": "VI",
    //                         "name": "Virgin Islands"
    //                     },
    //                     {
    //                         "code": "VT",
    //                         "name": "Vermont"
    //                     },
    //                     {
    //                         "code": "WA",
    //                         "name": "Washington"
    //                     },
    //                     {
    //                         "code": "WI",
    //                         "name": "Wisconsin"
    //                     },
    //                     {
    //                         "code": "WV",
    //                         "name": "West Virginia"
    //                     },
    //                     {
    //                         "code": "WY",
    //                         "name": "Wyoming"
    //                     }
    //                 ],
    //                 "usa": true,
    //                 "canada": false,
    //                 "fullAddress": "",
    //                 "preferred": false,
    //                 "id": "1",
    //                 "type": "primary"
    //             },
    //             "shippingAddresses": [],
    //             "primaryEmailAddress": {
    //                 "id": 1,
    //                 "type": "official",
    //                 "address": "McTareSheeche878453@gmail.com",
    //                 "addressPrefix": "McTareSheeche878453",
    //                 "addressSuffix": "@gmail.com",
    //                 "vettingStatus": {
    //                     "type": "vetted",
    //                     "vetted": true,
    //                     "notVetted": false,
    //                     "pending": false
    //                 },
    //                 "isEmailSameAsAccountName": false,
    //                 "vetted": true
    //             },
    //             "hasPendingAccountName": false,
    //             "loginHandles": {
    //                 "emailLoginHandles": [
    //                     {
    //                         "id": 1,
    //                         "type": "official",
    //                         "address": "McTareSheeche878453@gmail.com",
    //                         "addressPrefix": "McTareSheeche878453",
    //                         "addressSuffix": "@gmail.com",
    //                         "vettingStatus": {
    //                             "type": "vetted",
    //                             "vetted": true,
    //                             "notVetted": false,
    //                             "pending": false
    //                         },
    //                         "isEmailSameAsAccountName": false,
    //                         "vetted": true
    //                     }
    //                 ]
    //             },
    //             "alternateId": "000016-08-45092d51-f028-4d32-98ef-5d70b9929640",
    //             "ageCategory": 1,
    //             "allowAdditionalAlternateEmail": true,
    //             "maxAllowedSharedNumbers": 5,
    //             "isUnderAge": false,
    //             "hasFamily": false,
    //             "isFamilyOrganizer": false,
    //             "isDateOfBirthEditable": true,
    //             "isHSA2Eligible": false,
    //             "requiresGdprChildConsent": false,
    //             "minBirthday": "1875-03-20",
    //             "maxBirthday": "2025-12-31",
    //             "accountName": "mctaresheeche878453@gmail.com",
    //             "phoneNumbers": [],
    //             "managedAdministrator": false,
    //             "birthday": "1961-08-01",
    //             "maxAllowedAlternateEmails": 10,
    //             "ageLimits": {
    //                 "underAge": 13,
    //                 "minorAge": 18,
    //                 "ageCategory": "adult"
    //             },
    //             "hasPaymentMethod": false,
    //             "formattedAccountName": "mctaresheeche878453@gmail.com",
    //             "name": {
    //                 "middleNameRequired": false,
    //                 "firstName": "Lea",
    //                 "lastName": "Waters"
    //             }
    //         },
    //         "security": {
    //             "supportsDeviceSignout": false,
    //             "maxAllowedTrustedPhones": 0,
    //             "passwordPolicy": {},
    //             "hsa2Eligible": false,
    //             "questionsPresent": false,
    //             "allowHSAOptOut": true,
    //             "hasSecondaryPassword": false,
    //             "isHSAEnrollmentEmbargoed": false,
    //             "isContactEmailVerified": false,
    //             "questions": [],
    //             "birthday": "1961-08-01"
    //         },
    //         "makoNumberRetainable": false,
    //         "preferences": {
    //             "preferredLanguage": "en_US",
    //             "marketingPreferences": {
    //                 "appleUpdates": true,
    //                 "iTunesUpdates": true,
    //                 "appleNews": false,
    //                 "appleMusic": false
    //             },
    //             "privacyPreferences": {
    //                 "allowDeviceDiagnosticsAndUsage": false,
    //                 "allowICloudDataAnalytics": false,
    //                 "allowShareThirdPartyDevelopers": false
    //             }
    //         },
    //         "recycled": false,
    //         "dataRecoveryServiceStatusReadableOnUI": false,
    //         "custodianCountReadableOnUI": false,
    //         "lastPasswordChangedDate": "2025-03-20",
    //         "obfuscatedName": "mc******************************",
    //         "appleIDEditable": true,
    //         "lastPasswordChangedDatetime": "2025-03-20 08:42:56",
    //         "paymentMethodStatus": "NOT_LOADED",
    //         "ownsFamilyPaymentMethod": false,
    //         "hasFamilyPaymentMethod": false,
    //         "hasPrimaryPaymentMethod": false,
    //         "hasCustodians": false,
    //         "reclaimed": false,
    //         "federated": false,
    //         "paidaccount": false,
    //         "nameType": "email",
    //         "internalAccount": false,
    //         "eligibleForLegacyRk": false,
    //         "legacyRkExists": false,
    //         "modernRkExists": false,
    //         "paidMessagesApplicable": false,
    //         "type": "restricted"
    //     },
    //     "allowiCloudAccount": false,
    //     "privacyConsentAccepted": false,
    //     "sessionGeneratedWithSkippedFactor": false,
    //     "supportsDeviceSignOut": false,
    //     "privacyConsentRepair": false,
    //     "compliancePhoneRepairSupported": false,
    //     "phoneNumberRepairNoLongerRequired": false,
    //     "crossBorderPrivacyConsentRepair": false,
    //     "adiToAspPrivacyConsentRepair": false,
    //     "convertAccountWarningAccepted": false,
    //     "canSwapPhoneNumbers": false,
    //     "swapMakoPhoneNumber": false,
    //     "offerRegisteredPhoneNumberRepair": false,
    //     "offerConfirmedPhoneNumber": false,
    //     "offerChoiceForConfirmedPhoneNumber": false,
    //     "allowSkipPhoneNumberVerification": false,
    //     "emailVerificationRequired": true,
    //     "phoneNumberUsedAsAuthFactor": true,
    //     "requiresPassword": false,
    //     "appleCrossBorderPrivacyConsentRequired": false,
    //     "gcbdCrossBorderPrivacyConsentRequired": false,
    //     "adiToAspPrivacyConsentRequired": false,
    //     "restrictedAccountConversion": true,
    //     "emailRepairWithReachableAt": false,
    //     "phoneNumberRepair": false,
    //     "requiresTerms": false,
    //     "requiresPhoneNumber": true,
    //     "flowType": "repair",
    //     "supportsTerms": false,
    //     "remainingSteps": [
    //         "phoneNumberVerification",
    //         "privacyConsent"
    //     ],
    //     "compliancePhoneRequired": false,
    //     "displayRecycledDomainWarning": false,
    //     "displayiCloudConfirmationWarning": false,
    //     "displayPrivacyPolicyWarning": false,
    //     "displayPhoneNumberCollectionWarning": false,
    //     "displayAppleCrossBorderPrivacyConsentWarning": false,
    //     "displayAdiToAspPrivacyConsentWarning": false,
    //     "recycledDomainWarningAccepted": false,
    //     "iCloudConfirmationWarningAccepted": false,
    //     "privacyPolicyWarningAccepted": false,
    //     "phoneNumberCollectionWarningAccepted": false,
    //     "appleCrossBorderPrivacyConsentWarningAccepted": false,
    //     "gcbdCrossBorderPrivacyConsentWarningAccepted": false,
    //     "adiToAspPrivacyConsentWarningAccepted": false,
    //     "nextRemainingStep": "phoneNumberVerification",
    //     "firstRequiredStep": "phoneNumber",
    //     "maxBirthday": "2025-12-31",
    //     "hsa2Eligible": true,
    //     "phoneNumberRequired": false,
    //     "privacyConsentRequired": false,
    //     "maidaccountEligible": false,
    //     "shouldSuppressDevicePhoneNumbersOffer": false,
    //     "compliancePhoneSupported": false,
    //     "displayGcbdCrossBorderPrivacyConsentWarning": false,
    //     "actionValidationSuccessful": false,
    //     "clientActionCancel": false,
    //     "successful": false
    // }
    public function __construct(
        public int $success,
        public array $features,
        public array $phoneNumberVerification = [],
    ) {}
}