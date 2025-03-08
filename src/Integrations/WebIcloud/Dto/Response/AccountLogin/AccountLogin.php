<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Response\AccountLogin;

use Spatie\LaravelData\Data;

class AccountLogin extends Data
{
    public function __construct(
        public DsInfo $dsInfo,
        public array $webservices,
        public bool $pcsEnabled,
        public bool $hasMinimumDeviceForPhotosWeb,
        public bool $iCDPEnabled,
        public bool $isUnderMaintenance,
        public array $configBag,
        public bool $hsaTrustedBrowser,
        public array $appsOrder,
        public int $version,
        public bool $isExtendedLogin,
        public bool $pcsServiceIdentitiesIncluded,
        public int $userPartition,
        public bool $hsaChallengeRequired,
        public array $requestInfo,
        public bool $pcsDeleted,
        public array $iCloudInfo,
        public array $apps,
        public bool $termsUpdateNeeded = false,
        public bool $isRepairNeeded = false,
    ) {
    }
}
