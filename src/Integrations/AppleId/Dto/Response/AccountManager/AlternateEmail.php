<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class AlternateEmail extends Data
{
    public function __construct(
        /** @var string 邮箱地址 */
        public string $emailAddress = '',

        /** @var bool 是否已验证 */
        public bool $verified = false,

        /** @var bool 是否为备用邮箱 */
        public bool $isAlternate = true,

        /** @var bool 是否可编辑 */
        public bool $editable = true,

        /** @var bool 是否为救援邮箱 */
        public bool $isRescueEmail = false,

        /** @var array 邮箱验证历史 */
        public array $verificationHistory = [],

        /** @var null|string 添加时间 */
        public ?string $dateAdded = null,

        /** @var array 邮箱用途 */
        public array $purposes = []
    ) {}
}
