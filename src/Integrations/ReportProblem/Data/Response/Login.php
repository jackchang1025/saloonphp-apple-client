<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response;

use Spatie\LaravelData\Data;

class Login extends Data
{
    public function __construct(
        public string $dsid,
        public string $name,
        public string $email,
        public string $token,
        public int $sessionExpiryMs,
        public string $languageTag,
        public int $problemCount,
        public AmpAccount $ampAccount,
        public LoginConfig $config,
        public bool $enableFamilyUI,
        public bool $enableFamilyAPI,
        public string $mediaLinkSourceDsid,
        public string $mediaLinkTargetDsid,
        public array $dsidToPodMap,
        public array $enabledFeatures,
    ) {
    }
}
