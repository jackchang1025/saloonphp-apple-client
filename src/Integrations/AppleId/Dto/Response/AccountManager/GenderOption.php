<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

/**
 * 性别选项数据类.
 */
class GenderOption extends Data
{
    public function __construct(
        /**
         * 性别代码
         *
         * @var string
         */
        public string $code,

        /**
         * 性别描述.
         *
         * @var string
         */
        public string $description
    ) {}
}
