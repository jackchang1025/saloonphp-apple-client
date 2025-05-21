<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class CreateOptionsResponse extends Data
{
    // {
    //     "createAccountBeforeEmailVetting": false,
    //     "restrictedAccountEligible": true,
    //     "hsa2Eligible": false,
    //     "smsCodeEligible": false,
    //     "featureVersion": 10,
    //     "verificationDeliveryOptions": null,
    //     "countryDialCode": "1",
    //     "pageUUID": "o2a+kdfx25UoZb2hf+I42t8E5S8="
    // }
    public function __construct(
        public bool $createAccountBeforeEmailVetting,
        public bool $restrictedAccountEligible,
        public bool $hsa2Eligible,
        public bool $smsCodeEligible,
        public int $featureVersion,
        public string $countryDialCode,
        public string $pageUUID,
        public ?array $verificationDeliveryOptions = null,
    ) {}
}
