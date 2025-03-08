<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Request\AccountLogin;

use Spatie\LaravelData\Data;

class AccountLogin extends Data
{
    public function __construct(
        public readonly string $dsWebAuthToken,
        public readonly string $clientBuildNumber = '2426Hotfix51',
        public readonly string $clientMasteringNumber = '2426Hotfix51',
        public readonly string $clientId = '0af2f901-f9f0-4bba-a5eb-6f3381e97a5c',
        public readonly string $accountCountryCode = 'CHN',
        public readonly bool $extended_login = false,
        public readonly ?string $dsid = null,
        public readonly ?string $trustToken = null,
    ) {
    }
}
