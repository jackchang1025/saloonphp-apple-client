<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\DataConstruct\PhoneNumber;
use Weijiajia\SaloonphpAppleClient\DataConstruct\SecurityCode;

class PhoneNumberVerification extends Data
{
    public function __construct(
        public string $aboutTwoFactorAuthenticationUrl,
        public string $authenticationType,
        public bool $autoVerified,
        public bool $hideSendSMSCodeOption,
        public bool $hsa2Account,
        public bool $managedAccount,
        public bool $restrictedAccount,
        public string $cantUsePhoneNumberUrl,
        public string $recoveryUrl,
        public string $recoveryWebUrl,
        public string $repairPhoneNumberUrl,
        public string $repairPhoneNumberWebUrl,
        public SecurityCode $securityCode,
        public PhoneNumber $trustedPhoneNumber,
        // trustedPhoneNumbers
        #[DataCollectionOf(PhoneNumber::class)]
        public DataCollection $trustedPhoneNumbers,
        public ?string $showAutoVerificationUI = null,
        public ?string $supportsCustodianRecovery = null,
        public bool $supervisedChangePasswordFlow = false,
        public bool $supportsRecovery = false,
    ) {}
}
