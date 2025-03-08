<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\ITunesAccountPaymentInfo;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\MapName;

class ITunesAccountPaymentInfo extends Data
{

    /**
     * @param string $statusMessage
     * @param int $status
     * @param string|null $userAction
     * @param string|null $billingType
     * @param string|null $creditCardImageUrl
     * @param string|null $creditCardLastFourDigits
     * @param string|null $verificationType
     * @param string|null $creditCardId
     * @param string|null $creditCardType {
     * @param string|null $challengeReceipt
     * @param string|null $PaymentCardDescription
     * @param string|null $partnerLogin
     * @param string|null $smsSessionID
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

    ) {
    }
}
