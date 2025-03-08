<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Security;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Security extends Data
{
    public function __construct(
        /** @var bool 是否启用双重认证 */
        public bool $twoFactorAuthEnabled = false,

        /** @var bool 是否存在安全问题 */
        public bool $securityQuestionsExist = false,

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
    ) {
    }
}
