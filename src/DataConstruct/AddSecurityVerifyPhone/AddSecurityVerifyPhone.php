<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct\AddSecurityVerifyPhone;

use Spatie\LaravelData\Data;

class AddSecurityVerifyPhone extends Data implements AddSecurityVerifyPhoneInterface
{
    public function __construct(
        public string $countryCode,
        public string $phoneNumber,
        public string $countryDialCode,
        public string $phoneAddress,
    ) {
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getCountryDialCode(): string
    {
        return $this->countryDialCode;
    }

    public function getPhoneAddress(): string
    {
        return $this->phoneAddress;
    }
}
