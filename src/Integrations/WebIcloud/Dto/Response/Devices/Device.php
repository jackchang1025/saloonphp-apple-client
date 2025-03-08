<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\WebIcloud\Dto\Response\Devices;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Device extends Data
{
    public function __construct(
        public string $serialNumber,
        public string $osVersion,
        public string $modelLargePhotoURL2x,
        public string $modelLargePhotoURL1x,
        public string $name,
        public string $imei,
        public string $model,
        public string $udid,
        public string $modelSmallPhotoURL2x,
        public string $modelSmallPhotoURL1x,
        public string $modelDisplayName,
        #[DataCollectionOf(PaymentMethod::class)]
        public ?DataCollection $paymentMethods = null,
    ) {
    }
}
