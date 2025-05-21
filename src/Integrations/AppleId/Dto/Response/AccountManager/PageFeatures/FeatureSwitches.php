<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\PageFeatures;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class FeatureSwitches extends Data
{
    public function __construct(
        /** @var bool 是否显示设备部分 */
        public bool $showDeviceSection,

        /** @var bool 是否显示添加支付DOB U13 */
        public bool $showAddPaymentDOBU13,

        /** @var bool 是否显示主地址 */
        public bool $showPrimaryAddress,

        /** @var bool 是否显示隐私管理设置 */
        public bool $showPrivacyManageSettings,

        /** @var bool 是否允许交换别名 */
        public bool $allowSwapAlias,

        /** @var bool 是否降级 HSA1 */
        public bool $demoteHsa1,

        /** @var bool 是否显示联系电话号码 */
        public bool $showContactPhoneNumbers,

        /** @var bool 是否使用新的地址 API */
        public bool $useNewAddressAPI,

        /** @var bool 是否使用新的石墨联系人标签 */
        public bool $useNewGraphiteContactTab,

        /** @var bool 是否使用新的石墨安全标签 */
        public bool $useNewGraphiteSecurityTab,

        /** @var bool 是否使用新的石墨支付标签 */
        public bool $useNewGraphitePaymentTab,

        /** @var bool 是否为 HSA1 注册使用增强安全挑战 */
        public bool $useEnhancedSecurityChallengeForHSA1Enroll,

        /** @var bool 删除时默认配送地址 */
        public bool $defaultShippingAddressOnDelete,

        /** @var bool iForgot CR 重置 */
        public bool $iForgotCRReset,

        /** @var bool 联系邮箱修复 */
        public bool $contactEmailRepair,

        /** @var bool 是否允许规范账户名称 */
        public bool $allowCanonicalAccountNames,

        /** @var bool 是否允许在网页上创建 HSA2 */
        public bool $allowHSA2CreateOnWeb,

        /** @var bool 是否显示隐私部分 */
        public bool $showPrivacySection,

        /** @var bool 是否允许覆盖认证类型 */
        public bool $allowOverrideAuthType,

        /** @var bool 是否显示新的创建字段顺序 */
        public bool $showNewCreateFieldOrder,

        /** @var bool 是否显示账户消息 */
        public bool $showAccountMessages,

        /** @var bool 是否启用 Surf */
        public bool $enableSurf,

        /** @var bool 是否启用标准类型错误 */
        public bool $enableStandardsTypeError,

        /** @var bool 是否启用支付宝 V2 */
        public bool $enableAlipayV2,

        /** @var bool 是否在 Purple 上启用支付宝 V2 */
        public bool $enableAlipayV2OnPurple,

        /** @var bool 是否启用 U13 更新 Apple ID */
        public bool $enableU13UpdateAppleID,

        /** @var bool 是否启用隐私网关 */
        public bool $privacyGatewayEnabled,

        /** @var bool 是否显示合规号码 */
        public bool $showComplianceNumber,

        /** @var bool 是否在网页上收集 SA 电话号码 */
        public bool $collectSAPhoneNumberOnWeb,

        /** @var bool 是否启用 GDPR 父母同意 */
        public bool $enableGdprParentalConsent,

        /** @var bool 是否启用 GDPR 父母同意 CBXX */
        public bool $enableGdprParentalConsentCBXX,

        /** @var bool 是否启用 GDPR 父母同意 PayPal */
        public bool $enableGdprParentalConsentPayPal,

        /** @var bool 是否显示家庭共享信息 */
        public bool $showFamilySharingInfo,

        /** @var bool 是否显示成员个人资料照片 */
        public bool $showMemberProfilePhoto,

        /** @var bool 是否显示性别 */
        public bool $showGender,

        /** @var bool 是否显示眉毛表单 */
        public bool $showEyebrowForms,

        /** @var bool 是否启用 Broadway */
        public bool $enableBroadway,

        /** @var bool 是否启用第一方 Tiburon */
        public bool $ENABLE_FIRST_PARTY_TIBURON,

        /** @var bool 是否启用 OIDC 授权码 */
        public bool $ENABLE_OIDC_GRANT_CODE,

        /** @var bool 是否显示已连接的应用程序 */
        public bool $SHOW_CONNECTED_APPLICATIONS,

        /** @var bool 是否为 SiWA 启用家庭共享 */
        public bool $enableFamilySharingForSiWA,

        /** @var bool 青少年生日父母批准 */
        public bool $teenDOBParentalApproval,

        /** @var bool 网页上的 HSA2 注册是否已启用 */
        public bool $hsa2EnrollmentOnWebEnabled,

        /** @var bool 是否使用实验性石墨包 */
        public bool $useExperimentalGraphiteBundles,

        /** @var bool 是否启用 CWA 管理 */
        public bool $enableCWAManage,

        /** @var bool 是否禁用监护人功能 */
        public bool $disableCustodianFeatures,

        /** @var bool 是否禁用 HSA1 注册 */
        public bool $disableHSA1Enrollment,

        /** @var bool 是否为 HSA1 注册提供 2FA 注册 */
        public bool $offer2FAEnrollmentForHSA1Enrollment,

        /** @var bool 是否启用 AMK */
        public bool $enableAMK,

        /** @var bool 是否启用 AMK UI */
        public bool $enableAMKUI,

        /** @var bool 是否显示丰富的动画 */
        public bool $shouldShowRichAnimations,

        /** @var bool 用户通知 */
        public bool $userNotifications,

        /** @var bool 在设备上继续 */
        public bool $continueOnDevice,

        /** @var bool 是否禁用网页访问功能 */
        public bool $disableWebAccessFeatures,

        /** @var bool 是否启用非钓鱼 */
        public bool $enableNonPhishable,

        /** @var bool 是否启用推送令牌 */
        public bool $enablePushToken,

        /** @var bool 是否启用 HME 搜索 */
        public bool $enableHmeSearch,

        /** @var bool 是否显示组织数据共享 */
        public bool $showOrgDataSharing,

        /** @var bool 是否启用 MAID 隐私 OBK */
        public bool $enableMAIDPrivacyOBK,

        /** @var bool 是否启用 Mako 收件箱 UI */
        public bool $enableMakoInboxUI,

        /** @var bool 是否启用警告图片 */
        public bool $enableCautionImages,

        /** @var bool 是否在创建时隐藏 Apple News 偏好 */
        public bool $hideAppleNewsPreferenceOnCreate,

        /** @var bool 是否在管理时隐藏 Apple News 偏好 */
        public bool $hideAppleNewsPreferenceOnManage,

        /** @var bool 是否为临时组织显示验证码 */
        public bool $showCaptchaForProvisionalOrgs,

        /** @var bool 是否启用望远镜重新设计 */
        public bool $enableSpyglassRedesign,

        /** @var bool 是否启用 Mako 升级 */
        public bool $enableMakoUpgrade,

        /** @var bool 是否启用新的 Apple ID 创建体验 */
        public bool $enableNewAppleIDCreateExperience,

        /** @var bool 是否显示遥测 UI 披露 */
        public bool $showTelemetryUIDisclosure,

        /** @var bool 是否在子更改 Apple ID 期间启用内联父认证 */
        public bool $enableInlineParentAuthDuringChildChangeAppleID,

        /** @var bool 是否启用来自嵌套域的帧祖先 */
        public bool $enableFrameAncestorsFromNestedDomains,

        /** @var bool 是否启用查找 Apple ID */
        public bool $findAppleIDEnabled,

        /** @var bool 是否从恢复 URL 中删除账户名称 */
        public bool $removeAccountNameFromRecoveryUrl,

        /** @var bool 是否启用安全令牌恢复 */
        public bool $enableSecureTokenRecovery,

        /** @var bool 是否启用身份验证重新设计 */
        public bool $enableAuthenticIdentityRedesign,

        /** @var bool 是否启用 SiWA 重新设计 */
        public bool $enableSiwaRedesign,

        /** @var bool 是否启用 Apple ID 品牌重塑 */
        public bool $enableAppleIDRebrand,

        /** @var bool 是否启用添加新的 iCloud 邮箱 */
        public bool $enableAddNewiCloudEmail,

        /** @var bool 是否为 MacOS 启用身份验证重新设计 */
        public bool $enableAuthenticIdentityRedesignForMacOs,

        /** @var bool 是否使用实验模式启用身份验证重新设计 */
        public bool $enableAuthenticIdentityRedesignWithExperimentMode,

        /** @var bool 设备认证 */
        public bool $deviceAttestation,

        /** @var bool 创建期间青少年的默认偏好是否未选中 */
        public bool $defaultPreferencesUncheckedForTeenDuringCreate,

        /** @var bool 是否显示新建 */
        public bool $shouldShowNewCreate,

        /** @var bool 是否记录请求标头名称 */
        public bool $logRequestHeaderNames,

        /** @var bool EDP 恢复令牌行 */
        public bool $edpRecoveryTokenRow,

        /** @var bool 是否为 iOS 启用账户恢复重新设计 */
        public bool $enableAccountRecoveryRedesignForiOS,

        /** @var bool 是否为 MacOS 启用账户恢复重新设计 */
        public bool $enableAccountRecoveryRedesignForMacOS,

        /** @var bool 是否启用中场休息 */
        public bool $enableIntermission,

        /** @var bool 是否为内部用户启用中场休息 */
        public bool $enableIntermissionForInternalUsers,

        /** @var bool 是否启用账户回收转换到 MAID */
        public bool $reclaimAccountConversionToMaidEnabled
    ) {}

    /**
     * 获取安全相关的功能开关.
     */
    public function getSecurityFeatures(): array
    {
        return [
            'hsa' => [
                'allowHSA2CreateOnWeb' => $this->allowHSA2CreateOnWeb,
                'disableHSA1Enrollment' => $this->disableHSA1Enrollment,
                'hsa2EnrollmentOnWebEnabled' => $this->hsa2EnrollmentOnWebEnabled,
                'useEnhancedSecurityChallengeForHSA1Enroll' => $this->useEnhancedSecurityChallengeForHSA1Enroll,
            ],
            'authentication' => [
                'enableNonPhishable' => $this->enableNonPhishable,
                'deviceAttestation' => $this->deviceAttestation,
                'enableAuthenticIdentityRedesign' => $this->enableAuthenticIdentityRedesign,
            ],
        ];
    }

    /**
     * 获取UI相关的功能开关.
     */
    public function getUIFeatures(): array
    {
        return [
            'graphite' => [
                'useNewGraphiteContactTab' => $this->useNewGraphiteContactTab,
                'useNewGraphiteSecurityTab' => $this->useNewGraphiteSecurityTab,
                'useNewGraphitePaymentTab' => $this->useNewGraphitePaymentTab,
                'useExperimentalGraphiteBundles' => $this->useExperimentalGraphiteBundles,
            ],
            'display' => [
                'shouldShowRichAnimations' => $this->shouldShowRichAnimations,
                'enableCautionImages' => $this->enableCautionImages,
                'showEyebrowForms' => $this->showEyebrowForms,
            ],
        ];
    }

    /**
     * 获取隐私相关的功能开关.
     */
    public function getPrivacyFeatures(): array
    {
        return [
            'gdpr' => [
                'enableGdprParentalConsent' => $this->enableGdprParentalConsent,
                'enableGdprParentalConsentCBXX' => $this->enableGdprParentalConsentCBXX,
                'enableGdprParentalConsentPayPal' => $this->enableGdprParentalConsentPayPal,
            ],
            'privacy' => [
                'privacyGatewayEnabled' => $this->privacyGatewayEnabled,
                'showPrivacySection' => $this->showPrivacySection,
                'showPrivacyManageSettings' => $this->showPrivacyManageSettings,
            ],
        ];
    }

    /**
     * 检查是否启用了新的用户体验功能.
     */
    public function hasNewExperienceEnabled(): bool
    {
        return $this->enableNewAppleIDCreateExperience
            || $this->enableSiwaRedesign
            || $this->enableAppleIDRebrand;
    }

    /**
     * 检查是否启用了特定平台的功能.
     */
    public function isPlatformFeatureEnabled(string $platform): bool
    {
        return match ($platform) {
            'ios' => $this->enableAccountRecoveryRedesignForiOS,
            'macos' => $this->enableAccountRecoveryRedesignForMacOS,
            default => false,
        };
    }
}
