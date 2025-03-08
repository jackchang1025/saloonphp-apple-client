<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Validate;

use Spatie\LaravelData\Data;

class Account extends Data
{
    public function __construct(
        public string $name,
        public string $password,
        public Person $person,
        public Preferences $preferences,
        public VerificationInfo $verificationInfo,
    ) {}
}