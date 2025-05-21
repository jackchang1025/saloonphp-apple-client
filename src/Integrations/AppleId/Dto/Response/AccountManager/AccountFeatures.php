<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

/**
 * 账户功能数据类.
 */
class AccountFeatures extends Data
{
    public function __construct(
        /**
         * 是否启用ADP.
         *
         * @var bool
         */
        public bool $isADPEnabled = false,

        /**
         * 其他功能标志.
         *
         * @var array
         */
        public array $additionalFeatures = []
    ) {}
}
