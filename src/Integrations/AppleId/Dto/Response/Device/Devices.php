<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class Devices extends Data
{

    public function __construct(
        #[DataCollectionOf(Device::class)]
        public DataCollection $devices,
        public string $hsa2SignedInDevicesLink,
        public bool $suppressChangePasswordLink,
    ) {
    }
}
