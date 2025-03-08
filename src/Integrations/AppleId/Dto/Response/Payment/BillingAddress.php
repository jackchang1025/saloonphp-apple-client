<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class BillingAddress extends Data
{
    public function __construct(
        public bool $defaultAddress,
        public bool $stateProvinceInvalid,
        public bool $japanese,
        public bool $korean,
        public array $formattedAddress,
        public bool $primary,
        public bool $shipping,
        public string $countryCode,
        public string $countryName,
        #[DataCollectionOf(StateProvince::class)]
        public DataCollection $stateProvinces,
        public bool $usa,
        public bool $canada,
        public bool $preferred,
        public string $fullAddress,
        public string $id,
        public ?string $stateProvinceCode = null,
        public ?string $line1 = null,
        public ?string $line2 = null,
        public ?string $city = null,
        public ?string $stateProvinceName = null,
        public ?string $postalCode = null,
        public ?array $stateProvince = null,
    ) {
    }
}
