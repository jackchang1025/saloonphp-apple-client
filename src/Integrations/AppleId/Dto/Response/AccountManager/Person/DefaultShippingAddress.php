<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class DefaultShippingAddress extends Data
{
    public function __construct(
        public ?bool $defaultAddress = null,
        public ?bool $stateProvinceInvalid = null,
        public ?bool $japanese = null,
        public ?bool $korean = null,
        public ?array $formattedAddress = [],
        public ?bool $primary = null,
        public ?bool $shipping = null,
        public ?string $countryCode = null,
        public ?string $label = null,
        public ?string $city = null,
        public ?StateProvince $stateProvince = null,
        public ?string $postalCode = null,
        public ?string $countryName = null,
        public ?string $recipientFirstName = null,
        public ?string $recipientLastName = null,
        public ?array $stateProvinces = [],
        public ?bool $usa = null,
        public ?bool $canada = null,
        public ?string $fullAddress = null,
        public ?bool $preferred = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?string $county = null,
        public ?string $suburb = null,
        public ?string $company = null,
        public ?string $line1 = null,
        public ?string $line2 = null,
        public ?string $line3 = null,
    ) {}
}
