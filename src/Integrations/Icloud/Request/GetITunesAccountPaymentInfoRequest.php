<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\ITunesAccountPaymentInfo\ITunesAccountPaymentInfo;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class GetITunesAccountPaymentInfoRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public readonly string $organizerDSID,
        public readonly string $userAction = "ADDING_FAMILY_MEMBER",
        public readonly bool $sendSMS = true,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/setup/mac/family/getiTunesAccountPaymentInfo';
    }

    public function defaultBody(): array
    {
        return [
            "organizerDSID" => $this->organizerDSID,
            "userAction"    => $this->userAction,
            "sendSMS"       => $this->sendSMS,
        ];
    }

    public function createDtoFromResponse(Response $response): ITunesAccountPaymentInfo
    {
        return ITunesAccountPaymentInfo::from($response->json());
    }

    /**
     * "{\"userAction\":\"ADDING_FAMILY_MEMBER\",\"status-message\":\"Success\",\"billingType\":\"Card\",\"creditCardImageUrl\":\"https://setup.icloud.com/resource/9b13a43759e5/imgs/family/MasterCard@2x.png\",
 * \"creditCardLastFourDigits\":\"3030\",\"verificationType\":\"CVV\",\"creditCardId\":\"MAST\",\"creditCardType\":\"MasterCard\",\"status\":0}"
     *
     * {"userAction":"ADDING_FAMILY_MEMBER","status-message":"Success","challengeReceipt":"+86130******21","billingType":"Card","creditCardImageUrl":"https://setup.icloud.com/resource/9b13a43759e5/imgs/family/WeChatPay@2x.png",
     * "PaymentCardDescription":"............",
     * "partnerLogin":"B*******34","verificationType":"SMS","creditCardId":"WCPY","creditCardType":"............","smsSessionID":"17325465902919352003gY2S0WXiGW","status":0}
     */
}
