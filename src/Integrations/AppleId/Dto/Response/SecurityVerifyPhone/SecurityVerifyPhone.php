<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SecurityVerifyPhone extends Data
{
    public function __construct(
        public ?PhoneNumberVerification $phoneNumberVerification = null,
        public ?PhoneNumber $phoneNumber = null,
    ) {}
}
