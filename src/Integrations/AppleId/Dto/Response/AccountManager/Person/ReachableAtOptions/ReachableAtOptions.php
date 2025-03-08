<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person\ReachableAtOptions;


use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\AppleID;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\PrimaryEmailAddress;

/**
 * 可达选项数据类
 */
class ReachableAtOptions extends Data
{
    public function __construct(
        /**
         * 是否允许 iCloud 分享号码功能
         * @var bool
         */
        public bool $allowiCloudSharingNumbersFeature,

        /**
         * 是否允许添加 iCloud 号码
         * @var bool
         */
        public bool $allowiCloudNumbersAddition,

        /**
         * 是否允许添加备用邮箱
         * @var bool
         */
        public bool $allowAlternateEmailAddition,

        /**
         * 联系信息选项
         * @var ContactInformationOptions
         */
        public ContactInformationOptions $contactInformationOptions,



        /**
         * 账户名称是否可编辑
         * @var bool
         */
        public bool $accountNameEditable,

        /**
         * iMessage 注销学习更多链接
         * @var string
         */
        public string $iMessageDeregisterLearnMoreLink,

        /**
         * Apple ID 信息
         * @var AppleID
         */
        public AppleID $appleID,

        /**
         * iMessage 电话号码列表
         * @var array
         */
        public array $iMessagePhoneNumbers,

        /**
         * iCloud 分享电话号码列表
         * @var array
         */
        public array $iCloudSharingPhoneNumbers,

        /**
         * 可信电话号码登录句柄学习更多链接
         * @var string
         */
        public string $trustedPhoneNumberLoginHandleLearnMoreLink,

        /**
         * IDs 不可达学习更多链接
         * @var string
         */
        public string $idsNotReachableLearnMoreLink,

        /**
         * iMessage 登录句柄所有权学习更多链接
         * @var string
         */
        public string $iMessageLoginHandleOwnershipLearnMoreLink,

        /**
         * 主电子邮件地址
         * @var PrimaryEmailAddress
         */
        public PrimaryEmailAddress $primaryEmailAddress,

        /**
         * 备用电子邮件地址列表
         * @var array
         */
        public array $alternateEmailAddresses,

        /**
         * 是否为付费账户
         * @var bool
         */
        public bool $paidAccount,

        /**
         * 是否符合 Mako 升级条件
         * @var bool
         */
        public bool $makoUpgradeEligible,

        /**
         * 是否符合新的 iCloud 邮箱作为可达地址的条件
         * @var bool
         */
        public bool $eligibleForNewiCloudEmailAddressAsReachableAt,

        /**
         * 是否符合新的 iCloud 邮箱作为主地址的条件
         * @var bool
         */
        public bool $eligibleForNewiCloudEmailAddressAsPrimary,

        /**
         * 是否为非 FTEU 启用
         * @var bool
         */
        public bool $nonFTEUEnabled,

        /**
         * 账户名称是否与主邮箱相同
         * @var bool
         */
        public bool $accountNameSameAsPrimaryEmail,

        /**
         * 账户名称
         * @var string
         */
        public string $accountName,

        /**
         * 电话号码列表
         * @var array
         */
        public array $phoneNumbers = [],
    ) {
    }
}
