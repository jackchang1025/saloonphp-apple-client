<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Payment;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\BillingAddress;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\NameOnCard;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\AddPayment\PhoneNumber;

abstract class AddPayment extends Data
{
    public function __construct(
        public string $partnerToken,
        public NameOnCard $nameOnCard,
        public PhoneNumber $phoneNumber,
        public BillingAddress $billingAddress,
        public int $id,
    ) {
    }
}
