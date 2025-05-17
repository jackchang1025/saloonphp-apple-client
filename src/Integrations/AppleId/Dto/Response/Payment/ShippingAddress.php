<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ShippingAddress extends Data
{
    public function __construct(
        public bool $defaultAddress,
        public bool $stateProvinceInvalid,
        public bool $japanese,
        public bool $korean,
        /** @var array<string> */
        public array $formattedAddress,
        public bool $preferred,
        public bool $primary,
        public bool $shipping,
        public string $countryCode,
        public ?string $label = null,
        public ?string $company = null,
        public ?string $line1 = null,
        public ?string $line2 = null,
        public ?string $line3 = null,
        public ?string $city = null,
        public ?string $stateProvinceCode = null,
        public ?string $stateProvinceName = null,
        public ?array $stateProvince = null,
        public ?string $postalCode = null,
        public ?string $countryName = null,
        public ?string $recipientFirstName = null,
        public ?string $recipientLastName = null,
        public bool $usa = false,
        public bool $canada = false,
        public ?string $fullAddress = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {
    }
} 