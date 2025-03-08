<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
class VerificationEmail extends Data
{
    //{
//     "name": "admin@xxxxxx.team",
//     "verificationInfo": {
//         "id": "000662-00-4711e20d322bc7da2adf0776f3a89e1c1f502cd2519258115d652b1b11fc4a3aLTOW",
//         "answer": "539077"
//     }
// }
    public function __construct(
        public string $name,
        public VerificationInfo $verificationInfo,
    ) {}
}