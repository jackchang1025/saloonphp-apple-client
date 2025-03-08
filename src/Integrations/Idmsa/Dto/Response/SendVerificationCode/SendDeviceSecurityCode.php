<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\DataConstruct\SecurityCode;

class SendDeviceSecurityCode extends Data
{

    public function __construct(
        public PhoneNumberVerification $phoneNumberVerification,
        public string $aboutTwoFactorAuthenticationUrl,
        public SecurityCode $securityCode,
        public ?int $trustedDeviceCount = null,
        public ?string $otherTrustedDeviceClass = null,
    ) {
    }
}
