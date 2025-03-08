<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Verification;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SendVerificationEmail extends Data
{
    //{
//     "account": {
//         "name": "admin@xxxxxx.team",
//         "person": {
//             "name": {
//                 "firstName": "chang",
//                 "lastName": "matthew"
//             }
//         }
//     },
//     "countryCode": "USA"
// }
    public function __construct(
        public Account $account,
        public string $countryCode = 'USA',
    ) {
    }
}
