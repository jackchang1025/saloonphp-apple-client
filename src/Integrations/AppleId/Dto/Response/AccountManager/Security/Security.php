<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Security;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Security extends Data
{
    public function __construct(
        /** @var Device[] 设备列表 */
        #[DataCollectionOf(Device::class)]
        public DataCollection $devices,

        /** @var bool 是否支持设备退出 */
        public bool $supportsDeviceSignout = true,

        /** @var int 最大允许的可信电话数量 */
        public int $maxAllowedTrustedPhones = 10,

        /** @var array 密码策略 */
        public array $passwordPolicy = [],

        /** @var bool 是否符合HSA2资格 */
        public bool $hsa2Eligible = false,

        /** @var bool 是否存在安全问题 */
        public bool $questionsPresent = false,

        /** @var bool 是否允许HSA选择退出 */
        public bool $allowHSAOptOut = false,

        /** @var bool 是否有辅助密码 */
        public bool $hasSecondaryPassword = false,

        /** @var bool HSA enrollment是否被限制 */
        public bool $isHSAEnrollmentEmbargoed = false,

        /** @var bool 联系邮箱是否已验证 */
        public bool $isContactEmailVerified = false,

        /** @var PhoneNumber[] 电话号码列表 */
        #[DataCollectionOf(PhoneNumber::class)]
        public DataCollection $phoneNumbers,

        /** @var null|string 生日 */
        public ?string $birthday = null,

        /** @var bool 是否启用双重认证 */
        public bool $twoFactorAuthEnabled = false,

        /** @var bool 是否可以重置密码 */
        public bool $passwordResetEligible = false,

        /** @var array 受信任的手机号码 */
        public array $trustedPhoneNumbers = [],

        /** @var bool 是否启用恢复密钥 */
        public bool $recoveryKeyEnabled = false,

        /** @var bool 是否需要额外验证 */
        public bool $additionalAuthenticationRequired = false,

        /** @var array 安全设置历史 */
        public array $securityHistory = [],

        /** @var string 最后更新时间 */
        public string $lastUpdated = ''
    ) {}
}
