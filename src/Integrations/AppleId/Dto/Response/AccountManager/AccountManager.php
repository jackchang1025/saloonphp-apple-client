<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\PageFeatures\PageFeatures;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
class AccountManager extends Data
{
    public function __construct(
        /** @var CountryFeatures 国家/地区功能特性配置 */
        public ?CountryFeatures $countryFeatures = null,

        /** @var string API密钥 */
        public string $apiKey = '',

        /** @var bool 是否符合HSA资格 */
        public bool $isHsaEligible = false,

        /** @var bool 是否启用从右到左显示 */
        public bool $enableRightToLeftDisplay = false,

        /** @var bool 登录句柄是否可用 */
        public bool $loginHandleAvailable = true,

        /** @var bool Apple ID是否与主邮箱相同 */
        public bool $isAppleIdAndPrimaryEmailSame = false,

        /** @var bool 是否显示受益人UI */
        public bool $shouldShowBeneficiaryUI = false,

        /** @var bool 是否显示NPA */
        public bool $showNpa = false,

        /** @var PageFeatures 页面特性配置 */
        public ?PageFeatures $pageFeatures = null,

        /** @var string 本地化的生日 */
        public string $localizedBirthday = '',

        /** @var bool 是否显示HSA2恢复密钥部分 */
        public bool $showHSA2RecoveryKeySection = false,

        /** @var string 姓名顺序 */
        public string $nameOrder = '',

        /** @var array 模块配置 */
        public array $modules = [],

        /** @var array 备用邮箱地址列表 */
        public array $alternateEmailAddresses = [],

        /** @var array 限制电话号码删除的国家列表 */
        public array $countriesWithPhoneNumberRemovalRestriction = [],

        /** @var AlternateEmail 添加备用邮箱配置 */
        public ?AlternateEmail $addAlternateEmail = null,

        /** @var bool 是否需要名字发音 */
        public bool $pronounceNamesRequired = false,

        /** @var array 本地化资源 */
        public array $localizedResources = [],

        /** @var string Apple ID显示 */
        public string $appleIDDisplay = '',

        /** @var Name 姓名信息 */
        public ?Name $name = null,

        /** @var bool 账户名称是否可编辑 */
        public bool $isAccountNameEditable = false,

        /** @var bool 是否显示数据恢复服务UI */
        public bool $shouldShowDataRecoveryServiceUI = false,

        /** @var bool 是否显示数据恢复服务UI */
        public bool $showDataRecoveryServiceUI = false,

        /** @var DisplayName 显示名称 */
        public ?DisplayName $displayName = null,

        /** @var array 支持链接 */
        public array $supportLinks = [],

        /** @var bool 是否需要中间名 */
        public bool $middleNameRequired = false,

        /** @var AppleID Apple ID信息 */
        #[MapOutputName('apple_id')]
        public ?AppleID $appleID = null,

        /** @var PrimaryEmailAddress 主邮箱地址 */
        public ?PrimaryEmailAddress $primaryEmailAddress = null,

        /** @var bool 是否为HSA账户 */
        public bool $isHsa = false,
    ) {
    }
}
