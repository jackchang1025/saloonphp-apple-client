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
        public string $label,
        public string $company,
        public string $line1,
        public string $line2,
        public string $line3,
        public string $city,
        public string $stateProvinceCode,
        public string $stateProvinceName,
        public array $stateProvince,
        public string $postalCode,
        public string $countryName,
        public string $recipientFirstName,
        public string $recipientLastName,
        public bool $usa,
        public bool $canada,
        public string $fullAddress,
        public string $id,
        public string $type
    ) {
    }
} 