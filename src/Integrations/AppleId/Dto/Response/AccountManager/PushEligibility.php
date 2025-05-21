<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

/**
 * 推送资格数据类.
 */
class PushEligibility extends Data
{
    public function __construct(
        /**
         * 管理订阅.
         *
         * @var bool
         */
        public bool $manageSubscriptions = false,

        /**
         * 个人信息.
         *
         * @var bool
         */
        public bool $personalInfo = false,

        /**
         * 家庭共享.
         *
         * @var bool
         */
        public bool $familySharing = false,

        /**
         * 覆盖中心.
         *
         * @var bool
         */
        public bool $coverageCentral = false,

        /**
         * 密码和安全.
         *
         * @var bool
         */
        public bool $passwordAndSecurity = false,

        /**
         * 账户恢复.
         *
         * @var bool
         */
        public bool $accountRecovery = false,

        /**
         * 添加安全密钥.
         *
         * @var bool
         */
        public bool $addSecurityKeys = false,

        /**
         * 遗产联系人.
         *
         * @var bool
         */
        public bool $legacyContact = false,

        /**
         * 支付和配送
         *
         * @var bool
         */
        public bool $paymentShipping = false
    ) {}
}
