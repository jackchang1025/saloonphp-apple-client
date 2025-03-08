<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\Card;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\BillingAddress;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\NameOnCard;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\PhoneNumber;


class AddCardPayment extends Data
{

    public function __construct(
        public string $number,
        public string $expirationMonth,
        public string $expirationYear,
        public string $cvv,
        public NameOnCard $nameOnCard,
        public PhoneNumber $phoneNumber,
        public BillingAddress $billingAddress,
        public int $id,
    ) {
    }
}
