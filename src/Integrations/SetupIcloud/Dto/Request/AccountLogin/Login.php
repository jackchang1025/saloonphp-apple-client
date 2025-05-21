<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\AccountLogin;

use Spatie\LaravelData\Data;

class Login extends Data
{
    public function __construct(
        public string $dsWebAuthToken,
        public string $clientBuildNumber = '2426Hotfix51',
        public string $clientMasteringNumber = '2426Hotfix51',
        public string $clientId = '0af2f901-f9f0-4bba-a5eb-6f3381e97a5c',
        public string $accountCountryCode = 'CHN',
        public bool $extended_login = false,
        public ?string $dsid = null,
        public ?string $trustToken = null,
    ) {}
}
