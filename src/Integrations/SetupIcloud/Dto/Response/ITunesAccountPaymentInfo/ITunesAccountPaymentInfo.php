<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\ITunesAccountPaymentInfo;

use Spatie\LaravelData\Attributes\MapName;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ITunesAccountPaymentInfo extends Data
{
    /**
     * @param null|string $creditCardType {
     */
    public function __construct(
        #[MapName('status-message')]
        public string $statusMessage,
        public int $status,
        public ?string $userAction = null,
        public ?string $billingType = null,
        public ?string $creditCardImageUrl = null,
        public ?string $creditCardLastFourDigits = null,
        public ?string $verificationType = null,
        public ?string $creditCardId = null,
        public ?string $creditCardType = null,
        public ?string $challengeReceipt = null,
        public ?string $PaymentCardDescription = null,
        public ?string $partnerLogin = null,
        public ?string $smsSessionID = null,
    ) {}
}
