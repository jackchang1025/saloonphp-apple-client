<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PrimaryEmailAddress extends Data
{
    public function __construct(
        /** @var string 邮箱地址 */
        public string $emailAddress = '',

        /** @var bool 是否已验证 */
        public bool $verified = false,

        /** @var bool 是否为主要邮箱 */
        public bool $primary = true,

        /** @var bool 是否可编辑 */
        public bool $editable = false,

        /** @var bool 是否隐藏 */
        public bool $hidden = false,

        /** @var array 邮箱选项 */
        public array $options = []
    ) {
    }
}
