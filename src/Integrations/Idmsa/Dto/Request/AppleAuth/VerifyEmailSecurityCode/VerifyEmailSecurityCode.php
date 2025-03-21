<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\VerifyEmailSecurityCode;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class VerifyEmailSecurityCode extends Data
{
    //{
//     "id": "000800-00-8386f0c3748d7229d6fd966db671a54544dc0cf3d342d65a473cfa3ec219385dLTOW",
//     "securityCode": {
//         "code": "147258"
//     },
//     "emailAddress": {
//         "id": 1
//     }
// }
    public function __construct(
        public string $id,
        public SecurityCode $securityCode,
        public EmailAddress $emailAddress,
    )
    {
    }
}
