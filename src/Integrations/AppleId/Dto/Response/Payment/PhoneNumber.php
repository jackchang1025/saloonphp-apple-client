<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PhoneNumber extends Data
{
    public function __construct(
        /** @var bool 是否使用北美显示格式 */
        public bool $northAmericaDisplayFormat,

        /** @var bool 是否与Apple ID相同 */
        public bool $sameAsAppleId,

        /** @var string 国家代码 */
        public string $countryCode,

        /** @var bool 是否已验证 */
        public bool $vetted,

        /** @var string 国家拨号代码 */
        public string $countryDialCode,

        /** @var bool 是否为北美电话 */
        public bool $northAmericaPhone,

        /** @var bool 是否使用北美拨号代码 */
        public bool $northAmericaDialCode,

        /** @var bool 是否用作登录句柄 */
        public bool $loginHandle,

        /** @var string 国家代码（字符串形式） */
        public string $countryCodeAsString,

        /** @var bool 是否为受信任号码 */
        public bool $trusted,

        /** @var string 电话类型 */
        public string $type,
        public ?string $number = null,
        public ?string $numberWithoutAreaCode = null,
    ) {}
}
