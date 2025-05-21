<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person\Person;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Preferences\Preferences;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Security\Security;

/**
 * 账户数据类.
 */
class Account extends Data
{
    public function __construct(
        /**
         * 账户名称.
         *
         * @var string
         */
        public string $name,

        /**
         * 格式化的账户名称.
         *
         * @var string
         */
        public string $formattedAccountName,

        /**
         * 名称前缀
         *
         * @var string
         */
        public string $namePrefix,

        /**
         * 名称后缀
         *
         * @var string
         */
        public string $nameSuffix,

        /**
         * 个人信息.
         *
         * @var Person
         */
        public Person $person,

        /**
         * 安全信息.
         *
         * @var Security
         */
        public Security $security,

        /**
         * 是否保留 Mako 号码
         *
         * @var bool
         */
        public bool $makoNumberRetainable,

        /**
         * 最后一次更改密码的本地化日期
         *
         * @var string
         */
        public string $localizedLastPasswordChangedDate,

        /**
         * 偏好设置.
         *
         * @var Preferences
         */
        public Preferences $preferences,

        /**
         * 是否已回收.
         *
         * @var bool
         */
        public bool $recycled,

        /**
         * 受益人数量.
         *
         * @var int
         */
        public int $beneficiaryCount,

        /**
         * 监护人数量.
         *
         * @var int
         */
        public int $custodianCount,

        /**
         * 是否启用恢复密钥.
         *
         * @var bool
         */
        public bool $recoveryKeyEnabled,

        /**
         * 数据恢复服务状态是否在 UI 上可读.
         *
         * @var bool
         */
        public bool $dataRecoveryServiceStatusReadableOnUI,

        /**
         * 监护人数量是否在 UI 上可读.
         *
         * @var bool
         */
        public bool $custodianCountReadableOnUI,

        /**
         * 最后一次更改密码的日期
         *
         * @var string
         */
        public string $lastPasswordChangedDate,

        /**
         * 模糊化名称.
         *
         * @var string
         */
        public string $obfuscatedName,

        /**
         * Apple ID 是否可编辑.
         *
         * @var bool
         */
        public bool $appleIDEditable,

        /**
         * 最后一次更改密码的日期时间.
         *
         * @var string
         */
        public string $lastPasswordChangedDatetime,

        /**
         * 支付方式状态
         *
         * @var string
         */
        public string $paymentMethodStatus,

        /**
         * 是否拥有家庭支付方式.
         *
         * @var bool
         */
        public bool $ownsFamilyPaymentMethod,

        /**
         * 是否有家庭支付方式.
         *
         * @var bool
         */
        public bool $hasFamilyPaymentMethod,

        /**
         * 是否有主要支付方式.
         *
         * @var bool
         */
        public bool $hasPrimaryPaymentMethod,

        /**
         * 是否有监护人.
         *
         * @var bool
         */
        public bool $hasCustodians,

        /**
         * 是否已被回收.
         *
         * @var bool
         */
        public bool $reclaimed,

        /**
         * 是否为联合账户.
         *
         * @var bool
         */
        public bool $federated,

        /**
         * 是否为付费账户.
         *
         * @var bool
         */
        public bool $paidaccount,

        /**
         * 是否为内部账户.
         *
         * @var bool
         */
        public bool $internalAccount,

        /**
         * 是否符合旧版恢复密钥条件.
         *
         * @var bool
         */
        public bool $eligibleForLegacyRk,

        /**
         * 是否存在旧版恢复密钥.
         *
         * @var bool
         */
        public bool $legacyRkExists,

        /**
         * 是否存在现代恢复密钥.
         *
         * @var bool
         */
        public bool $modernRkExists,

        /**
         * 是否适用付费消息.
         *
         * @var bool
         */
        public bool $paidMessagesApplicable,

        /**
         * 账户类型.
         *
         * @var string
         */
        public string $type
    ) {}
}
