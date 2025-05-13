<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

trait AccountTypeIdentifier
{
    use HandlesAppleIdentity;

    /**
     * 检查标识符是否为有效的邮箱格式。
     * 使用 egulias/email-validator 进行 RFC 标准验证。
     * @see https://packagist.org/packages/egulias/email-validator
     *
     * @return bool
     */
    public function isEmailIdentifier(): bool
    {
        return !empty($this->appleId()) && (new EmailValidator())->isValid($this->appleId(), new RFCValidation());
    }

    /**
     * 检查标识符是否被视为手机号码。
     * 注意：这基于"不是有效邮箱格式就是手机号"的简化假设。
     * 对于更准确的手机号验证，应使用专门的库（如 libphonenumber）。
     *
     * @return bool
     */
    public function isPhoneIdentifier(): bool
    {
        return !empty($this->appleId()) && !$this->isEmailIdentifier();
    }

    /**
     * 获取账号标识符的类型。
     *
     * @return string 'email', 'phone', or 'unknown' if empty
     */
    public function getIdentifierType(): string
    {
        if (empty($this->appleId())) {
            return 'unknown';
        }

        return $this->isEmailIdentifier() ? 'email' : 'phone';
    }
}
