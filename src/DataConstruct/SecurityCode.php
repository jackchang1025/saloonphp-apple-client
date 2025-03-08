<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

class SecurityCode extends Data
{
    /**
     * @param bool $tooManyCodesSent 是否发送了过多的验证码
     * @param bool $tooManyCodesValidated 是否验证了过多的验证码
     * @param bool $securityCodeLocked 安全码是否被锁定
     * @param bool $securityCodeCooldown 安全码是否处于冷却期
     * @param bool $valid 安全码是否有效
     * @param string|null $code 安全码
     * @param int $length
     */
    public function __construct(
        public bool $tooManyCodesSent = false,
        public bool $tooManyCodesValidated = false,
        public bool $securityCodeLocked = false,
        public bool $securityCodeCooldown = false,
        public bool $valid = false,
        public ?string $code = null,
        public int $length = 6,
    ) {
    }
}
