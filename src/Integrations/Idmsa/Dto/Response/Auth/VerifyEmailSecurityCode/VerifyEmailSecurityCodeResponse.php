<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\VerifyEmailSecurityCode;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class VerifyEmailSecurityCodeResponse extends Data
{
    // {
    //     "trustedEmailAddresses": [
    //         {
    //             "obfuscatedAddress": "D•••••@gmail.com",
    //             "id": 1
    //         }
    //     ],
    //     "emailAddress": {
    //         "obfuscatedAddress": "D•••••@gmail.com",
    //         "id": 1
    //     },
    //     "securityCode": {
    //         "code": "147258",
    //         "tooManyCodesSent": false,
    //         "tooManyCodesValidated": false,
    //         "securityCodeLocked": false,
    //         "securityCodeCooldown": false
    //     },
    //     "authenticationType": "restricted",
    //     "recoveryUrl": "https://iforgot.apple.com/phone/add?prs_account_nm=dorothywilsonap0gz%40gmail.com&autoSubmitAccount=true&appId=142",
    //     "cantUseEmailAddressUrl": "https://gsa.apple.com/iforgot/email/add?context=cantuse&prs_account_nm=dorothywilsonap0gz%40gmail.com&autoSubmitAccount=true&appId=142",
    //     "dontHaveAccessUrl": "https://gsa.apple.com/iforgot/email/add?context=donthaveaccess&prs_account_nm=dorothywilsonap0gz%40gmail.com&autoSubmitAccount=true&appId=142",
    //     "recoveryWebUrl": "https://iforgot.apple.com/password/verify/appleid?prs_account_nm=dorothywilsonap0gz%40gmail.com&autoSubmitAccount=true&appId=142",
    //     "repairEmailAddressUrl": "https://gsa.apple.com/appleid/account/manage/repair/verify/phone",
    //     "repairEmailAddressWebUrl": "https://appleid.apple.com/widget/account/repair?#!repair",
    //     "supportsRecovery": true,
    //     "trustedEmailAddress": {
    //         "obfuscatedAddress": "D•••••@gmail.com",
    //         "id": 1
    //     },
    //     "hsa2Account": false,
    //     "restrictedAccount": true,
    //     "managedAccount": false,
    //     "serviceErrors": [
    //         {
    //             "code": "-21418",
    //             "message": "Incorrect verification code.",
    //             "suppressDismissal": false
    //         }
    //     ]
    // }
    public function __construct(
        public array $trustedEmailAddresses,
        public array $emailAddress,
        public array $securityCode,
        public string $authenticationType,
        public string $recoveryUrl,
        public string $cantUseEmailAddressUrl,
        public string $dontHaveAccessUrl,
        public string $recoveryWebUrl,
        public string $repairEmailAddressUrl,
        public string $repairEmailAddressWebUrl,
        public bool $supportsRecovery,
        public array $trustedEmailAddress,
        public bool $hsa2Account,
        public bool $restrictedAccount,
        public bool $managedAccount,
        public array $serviceErrors = [],
    ) {}
}
