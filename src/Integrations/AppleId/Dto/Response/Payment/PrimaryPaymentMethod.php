<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use App\Models\Payment;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class PrimaryPaymentMethod extends Data
{
    public function __construct(
        /** @var string 绝对图片路径 */
        public string $absoluteImagePath,

        /** @var string 2倍分辨率的绝对图片路径 */
        public string $absoluteImagePath2x,

        /** @var string 支付方式名称 */
        public string $paymentMethodName,

        /** @var PhoneNumber 电话号码信息 */
        public PhoneNumber $phoneNumber,

        /** @var OwnerName 所有者姓名信息 */
        public OwnerName $ownerName,

        /** @var BillingAddress 账单地址信息 */
        public BillingAddress $billingAddress,

        /** @var string 支付账户所在国家代码 */
        public string $paymentAccountCountryCode,

        /** @var bool 是否支持堆叠显示 */
        public bool $stackAware,

        /** @var bool 是否为Apple Pay支付 */
        public bool $applePayPayment,

        /** @var bool 是否支持该支付方式 */
        public bool $paymentSupported,

        /** @var bool 是否为家庭卡 */
        public bool $familyCard,

        /** @var bool 是否支持过期 */
        public bool $expirationSupported,

        /** @var PaymentMethodOption 支付方式选项 */
        public array $paymentMethodOption,

        /** @var bool 是否为空支付方式 */
        public bool $none,

        /** @var bool 是否为卡支付 */
        public bool $card,

        public bool $weChatPay,

        #[MapName('id')]
        public int $paymentId,

        public ?string $type = null,

        public ?string $paymentMethodDetail = null,

        public ?string $partnerLogin = null,

        public ?string $partnerLoginTest = null,

    )
    {
    }

    public function updateOrCreate(int $accountId): Payment
    {
        return Payment::updateOrCreate(
            [
                'account_id' => $accountId,
                'payment_id' => $this->paymentId,
            ],
            $this->toArray()
        );
    }
}
