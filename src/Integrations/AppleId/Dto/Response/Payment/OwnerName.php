<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Payment;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class OwnerName extends Data
{
    public function __construct(
        /** @var string 名字 */
        public string $firstName,

        /** @var string 姓氏 */
        public string $lastName,

        /** @var bool 是否要求姓氏在前 */
        public bool $lastNameFirstOrderingRequired,

        /** @var bool 名字中是否不需要空格 */
        public bool $noSpaceRequiredInName,

        /** @var string 完整发音名称 */
        public string $fullPronounceName,

        /** @var string 完整名称 */
        public string $fullName
    ) {}
}
