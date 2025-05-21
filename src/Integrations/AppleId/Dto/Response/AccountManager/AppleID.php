<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

/**
 * Apple ID 数据类.
 */
class AppleID extends Data
{
    public function __construct(
        /**
         * Apple ID 名称.
         *
         * @var string
         */
        public string $name = '',

        /**
         * 格式化的账户名称.
         *
         * @var string
         */
        public string $formattedAccountName = '',

        /**
         * 是否为非 FTEU 启用.
         *
         * @var bool
         */
        public bool $nonFTEUEnabled = false,

        /**
         * 模糊化的 Apple ID.
         *
         * @var string
         */
        public string $obfuscatedAppleId = '',

        /**
         * 是否可编辑.
         *
         * @var bool
         */
        public bool $editable = false,

        /**
         * 账户名称.
         *
         * @var string
         */
        public string $accountName = '',

        /**
         * 是否为 Apple 拥有的域名.
         *
         * @var bool
         */
        public bool $appleOwnedDomain = false,

        /**
         * 域名.
         *
         * @var string
         */
        public string $domain = '',
    ) {}
}
