<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person\ReachableAtOptions\ReachableAtOptions;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\PrimaryEmailAddress;

class Person extends Data
{
    public function __construct(
        /** @var string 姓名字符串 */
        public ?Name $name = null,

        /** @var null|string 生日 */
        public ?string $birthday = null,

        /** @var null|string 性别 */
        public ?string $gender = null,

        /** @var null|PrimaryAddress 主要地址 */
        public ?PrimaryAddress $primaryAddress = null,

        /** @var array 电话号码列表 */
        public array $phoneNumbers = [],

        /** @var array 其他地址列表 */
        public array $addresses = [],

        /** @var bool 是否已验证 */
        public bool $verified = false,

        /** @var array 其他个人信息 */
        public array $additionalInfo = [],

        /** @var null|ReachableAtOptions 可达选项 */
        public ?ReachableAtOptions $reachableAtOptions = null,

        /** @var array 配送地址列表 */
        public array $shippingAddresses = [],

        /** @var null|PrimaryEmailAddress 主邮箱地址 */
        public ?PrimaryEmailAddress $primaryEmailAddress = null,

        /** @var bool 是否有待处理的账户名称 */
        public bool $hasPendingAccountName = false,

        /** @var null|LoginHandles 登录句柄 */
        public ?LoginHandles $loginHandles = null,

        /** @var bool 是否允许额外的备用邮箱 */
        public bool $allowAdditionalAlternateEmail = true,

        /** @var int 最大允许的共享号码数 */
        public int $maxAllowedSharedNumbers = 5,

        /** @var bool 是否未成年 */
        public bool $isUnderAge = false,

        /** @var bool 是否有家庭 */
        public bool $hasFamily = false,

        /** @var bool 是否为家庭组织者 */
        public bool $isFamilyOrganizer = false,

        /** @var bool 出生日期是否可编辑 */
        public bool $isDateOfBirthEditable = true,

        /** @var bool 是否符合HSA2资格 */
        public bool $isHSA2Eligible = false,

        /** @var bool 是否需要GDPR儿童同意 */
        public bool $requiresGdprChildConsent = false,

        /** @var string 最小生日 */
        public string $minBirthday = '',

        /** @var string 最大生日 */
        public string $maxBirthday = '',

        /** @var string 账户名称 */
        public string $accountName = '',

        /** @var bool 是否为管理员 */
        public bool $managedAdministrator = false,

        /** @var null|DefaultShippingAddress 默认配送地址 */
        public ?DefaultShippingAddress $defaultShippingAddress = null,

        /** @var int 最大允许的备用邮箱数 */
        public int $maxAllowedAlternateEmails = 10,

        /** @var bool 是否有支付方式 */
        public bool $hasPaymentMethod = false,

        /** @var string 格式化的账户名称 */
        public string $formattedAccountName = '',
    ) {}
}
