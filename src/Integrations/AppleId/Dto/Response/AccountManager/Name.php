<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Name extends Data
{
    public function __construct(
        /** @var string 名字 */
        public string $firstName = '',

        /** @var string 姓氏 */
        public string $lastName = '',

        /** @var null|string 中间名 */
        public ?string $middleName = null,

        /** @var string 全名 */
        public string $fullName = '',

        /** @var null|string 名字前缀 */
        public ?string $prefix = null,

        /** @var null|string 名字后缀 */
        public ?string $suffix = null,

        /** @var string 名字顺序 */
        public string $nameOrder = '',

        /** @var bool 是否需要发音 */
        public bool $pronounceRequired = false,

        /** @var array 发音信息 */
        public array $pronunciation = []
    ) {}
}
