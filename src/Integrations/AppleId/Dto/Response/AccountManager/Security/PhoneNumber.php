<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Security;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PhoneNumber extends Data
{
    public function __construct(
        /** @var bool 是否使用北美显示格式 */
        public bool $northAmericaDisplayFormat,

        /** @var string 原始号码 */
        public string $rawNumber,

        /** @var string 带国家代码的完整号码 */
        public string $fullNumberWithCountryPrefix,

        /** @var string 不带国家代码的号码 */
        public string $fullNumberWithoutCountryPrefix,

        /** @var bool 是否与 Apple ID 相同 */
        public bool $sameAsAppleId,

        /** @var string 国家代码 */
        public string $countryCode,

        /** @var string 电话号码 */
        public string $number,

        /** @var bool 是否已验证 */
        public bool $vetted,

        /** @var string 国家拨号代码 */
        public string $countryDialCode,

        /** @var bool 是否为北美电话 */
        public bool $northAmericaPhone,

        /** @var bool 是否为北美拨号代码 */
        public bool $northAmericaDialCode,

        /** @var bool 是否为登录句柄 */
        public bool $loginHandle,

        /** @var string 国家代码(字符串格式) */
        public string $countryCodeAsString,

        /** @var bool 是否为可信号码 */
        public bool $trusted,

        /** @var int 电话ID */
        public int $id,

        /** @var string 电话类型 (daytime等) */
        public string $type
    ) {}
}
