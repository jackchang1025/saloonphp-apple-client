<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct\AddSecurityVerifyPhone;

interface AddSecurityVerifyPhoneInterface
{
    public function getCountryCode(): string;

    public function getPhoneNumber(): string;

    public function getCountryDialCode(): string;

    public function getPhoneAddress(): string;
}
