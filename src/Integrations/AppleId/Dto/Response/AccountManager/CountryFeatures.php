<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class CountryFeatures extends Data
{
    public function __construct(
        /** @var string 国家代码 */
        public string $country = '',

        /** @var string 语言代码 */
        public string $language = '',

        /** @var bool 是否支持 iCloud */
        public bool $iCloudEnabled = false,

        /** @var bool 是否支持 Apple Pay */
        public bool $applePayEnabled = false,

        /** @var bool 是否支持家庭共享 */
        public bool $familySharingEnabled = false,

        /** @var array 可用服务列表 */
        public array $availableServices = [],

        /** @var array 地区限制 */
        public array $restrictions = [],

        /** @var array 支持的支付方式 */
        public array $supportedPaymentMethods = [],

        /** @var bool 是否需要税务信息 */
        public bool $requiresTaxInformation = false,

        /** @var array 货币信息 */
        public array $currencyInfo = []
    ) {
    }
}
