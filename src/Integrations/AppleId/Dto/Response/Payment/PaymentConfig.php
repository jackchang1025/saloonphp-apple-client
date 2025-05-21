<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PaymentConfig extends Data
{
    public function __construct(
        /** @var PrimaryPaymentMethod 主要支付方式 */
        public PrimaryPaymentMethod $primaryPaymentMethod,

        /** @var DataCollection<PaymentMethodOption> 可用的支付方式选项列表 */
        #[DataCollectionOf(PaymentMethodOption::class)]
        public DataCollection $paymentMethodOptions,

        /** @var PaymentMethodOption 当前选择的支付方式 */
        public PaymentMethodOption $currentPaymentOption,

        /** @var bool 是否允许更新支付方式 */
        public bool $paymentMethodUpdateAllowed,

        /** @var bool 是否允许更新家庭支付方式 */
        public bool $familyPaymentUpdateAllowed,

        /** @var bool 是否允许移除支付方式 */
        public bool $paymentRemovalAllowed,

        /** @var string iTunes账户摘要URL */
        #[MapName('iTunesThickAppAccountSummaryUrl')]
        public string $itunesAccountSummaryUrl,

        /** @var bool 是否支持平台资产 */
        public bool $supportsPlatformAssets,

        /** @var string 支付状态 */
        public string $paymentStatus,

        /** @var bool 主要支付方式是否为家庭支付 */
        public bool $primaryPaymentFamilyPayment,

        /** @var bool 支付方式是否在Web端支持但在当前客户端不支持 */
        public bool $paymentSupportedInWebButNotCurrentClient,

        /** @var bool 是否在Purple上启用支付宝V2 */
        public bool $enableAlipayV2OnPurple,

        /** @var bool 是否显示不支持的支付消息 */
        public bool $displayUnsupportedPaymentMessage,

        /** @var string 主卡图片路径 */
        public string $primaryCardImagePath,

        /** @var string 主卡2倍图片路径 */
        public string $primaryCardImagePath2x,

        /** @var string 主卡3倍图片路径 */
        public string $primaryCardImagePath3x,

        /** @var null|ShippingAddress 默认配送地址 */
        public ?ShippingAddress $defaultShippingAddress = null,
    ) {}
}
