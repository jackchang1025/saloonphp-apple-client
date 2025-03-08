<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Response\Devices;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Devices extends Data
{
    public function __construct(
        #[DataCollectionOf(Device::class)]
        public ?DataCollection $devices = null
    ) {
    }
}
