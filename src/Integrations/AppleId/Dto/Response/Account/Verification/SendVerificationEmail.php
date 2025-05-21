<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Account\Verification;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SendVerificationEmail extends Data
{
    // {
    //     "verificationId": "000662-00-4711e20d322bc7da2adf0776f3a89e1c1f502cd2519258115d652b1b11fc4a3aLTOW",
    //     "canGenerateNew": true,
    //     "newICloudEmail": false,
    //     "length": 6
    // }
    public function __construct(
        public string $verificationId,
        public bool $canGenerateNew,
        public bool $newICloudEmail,
        public int $length,
    ) {}
}
