<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\PageFeatures;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PageFeatures extends Data
{
    public function __construct(
        /** @var bool 是否启用Apple ID品牌重塑 */
        public bool $shouldEnableAppleIDRebrand = false,

        /** @var bool 是否隐藏国家选择器 */
        public bool $hideCountrySelector = false,

        /** @var bool 是否显示隐私部分 */
        public bool $showPrivacySection = true,

        /** @var bool 是否显示可信电话号码 */
        public bool $showTrustedPhoneNumber = true,

        /** @var bool 是否启用iForgot重置CR */
        public bool $isIForgotResetCREnabled = false,

        /** @var FeatureSwitches 功能开关集合 */
        public ?FeatureSwitches $featureSwitches = null,

        /** @var bool 是否显示隐私管理设置 */
        public bool $showPrivacyManageSettings = true,

        /** @var bool 是否显示生日 */
        public bool $showBirthday = true,

        /** @var bool 是否可编辑名称 */
        public bool $editName = true,

        /** @var string 默认语言 */
        public string $defaultLanguage = 'en_US',

        /** @var bool 是否显示额外的DOB文本 */
        public bool $showExtraDOBText = false,

        /** @var bool 是否隐藏首选语言 */
        public bool $hidePreferredLanguage = false,

        /** @var bool 是否显示主要地址 */
        public bool $showPrimaryAddress = true,

        /** @var bool 是否显示合规号码 */
        public bool $showComplianceNumber = true,

        /** @var bool 是否隐藏救援邮件 */
        public bool $hideRescueEmail = false,

        /** @var bool 是否隐藏通讯 */
        public bool $hideNewsletter = false,

        /** @var bool 是否显示主要邮件 */
        public bool $showPrimaryEmail = true,

        /** @var bool 是否可编辑联系邮件 */
        public bool $editContactEmail = false,

        /** @var string 默认国家 */
        public string $defaultCountry = 'USA'
    ) {}
}
