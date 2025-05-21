<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\DataConstruct\PhoneNumber;
use Weijiajia\SaloonphpAppleClient\DataConstruct\SecurityCode;

class PhoneNumberVerification extends Data
{
    /**
     * @param DataCollection<PhoneNumber> $trustedPhoneNumbers             受信任的电话号码列表
     * @param SecurityCode                $securityCode                    安全码相关数据
     * @param string                      $authenticationType              认证类型
     * @param string                      $recoveryUrl                     恢复URL
     * @param string                      $cantUsePhoneNumberUrl           无法使用电话号码时的URL
     * @param string                      $recoveryWebUrl                  Web恢复URL
     * @param string                      $repairPhoneNumberUrl            修复电话号码URL
     * @param string                      $repairPhoneNumberWebUrl         修复电话号码Web URL
     * @param bool                        $noTrustedDevices                是否没有受信任的设备
     * @param string                      $aboutTwoFactorAuthenticationUrl 关于双因素认证的URL
     * @param bool                        $autoVerified                    是否自动验证
     * @param bool                        $showAutoVerificationUI          是否显示自动验证UI
     * @param bool                        $supportsCustodianRecovery       是否支持监护人恢复
     * @param bool                        $hideSendSMSCodeOption           是否隐藏发送短信验证码选项
     * @param bool                        $supervisedChangePasswordFlow    是否为受监督的密码更改流程
     * @param bool                        $supportsRecovery                是否支持恢复
     * @param PhoneNumber                 $trustedPhoneNumber              当前使用的受信任电话号码
     * @param bool                        $hsa2Account                     是否为HSA2账户
     * @param bool                        $restrictedAccount               是否为受限账户
     * @param bool                        $managedAccount                  是否为托管账户
     */
    public function __construct(
        #[DataCollectionOf(PhoneNumber::class)]
        public DataCollection $trustedPhoneNumbers,
        public SecurityCode $securityCode,
        public string $authenticationType,
        public string $recoveryUrl,
        public string $cantUsePhoneNumberUrl,
        public string $recoveryWebUrl,
        public string $repairPhoneNumberUrl,
        public string $repairPhoneNumberWebUrl,
        public string $aboutTwoFactorAuthenticationUrl,
        public bool $autoVerified,
        public bool $showAutoVerificationUI,
        public bool $supportsCustodianRecovery,
        public bool $hideSendSMSCodeOption,
        public bool $supervisedChangePasswordFlow,
        public bool $supportsRecovery,
        public PhoneNumber $trustedPhoneNumber,
        public bool $hsa2Account,
        public bool $restrictedAccount,
        public bool $managedAccount,
        public bool $noTrustedDevices = false,
    ) {}
}
