<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device;

use App\Models\Devices;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class DeviceDetail extends Data
{

    public function __construct(
        #[MapName('id')]
        public string $deviceId,
        public ?string $listImageLocation = null,
        public ?string $listImageLocation2x = null,
        public ?string $listImageLocation3x = null,
        public ?string $infoboxImageLocation = null,
        public ?string $infoboxImageLocation2x = null,
        public ?string $infoboxImageLocation3x = null,
        public ?bool $currentDevice = null,
        public ?bool $removalPending = null,
        public ?string $deviceDetailHttpMethod = null,
        public ?string $deviceDetailUri = null,
        public ?string $osAndVersion = null,
        public ?bool $iCloudDevice = null,
        public ?bool $applePayCardRemovalPending = null,
        public ?bool $suppressChangePasswordLink = null,
        public ?bool $showBackupStatus = null,
        public ?bool $showSerialNumber = null,
        public ?bool $allowRemoval = null,
        public ?string $incompatibilityReasonKeyPart = null,
        public ?string $lastSignedInDate = null,
        public ?string $imei = null,
        public ?string $meid = null,
        public ?bool $fmipCapable = null,
        public ?bool $backupCapable = null,
        public ?string $backupUuid = null,
        public ?bool $unsupported = null,
        public ?string $serialNumber = null,
        public ?string $modelName = null,
        public ?string $name = null,
        public ?bool $supportsVerificationCodes = null,
        public ?bool $accountSupportsVerificationCodes = null,
        public ?bool $accountHSA2 = null,
        public ?bool $pushDevice = null,
        public ?bool $hasApplePayCards = null,
        public ?bool $hasActiveSurfAccount = null,
        public ?bool $hasNotJoinedCDPDuringAuth = null,
        public ?bool $supportsCDPJoinAfterAuthComplete = null,
        public ?string $deviceClassDisplayName = null,
        public ?string $fmipDeviceId = null,
        public ?bool $fmipEnabled = null,
        public ?bool $primary = null,
        public ?bool $secondary = null,
        public ?string $qualifiedDeviceClass = null,
        public ?string $deviceClass = null,
        public ?string $os = null,
        public ?string $color = null,
        public ?string $enclosureColor = null,
        public ?bool $trustedDevice = null,
        public ?string $osVersion = null,
        public ?string $type = null,
        public ?bool $untrusted = null
    ) {
    }

    public function updateOrCreate(int $accountId): Devices
    {
        return Devices::updateOrCreate(
            [
                'account_id' => $accountId,
                'device_id'  => $this->deviceId,
            ],
            $this->toArray()
        );
    }
}
