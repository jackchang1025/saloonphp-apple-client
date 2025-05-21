<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

/**
 * 地址功能数据类.
 */
class AddressFeatures extends Data
{
    public function __construct(
        /**
         * 是否需要邮编标签.
         *
         * @var bool
         */
        public bool $zipCodeLabelRequired = false,

        /**
         * 支持的国家列表.
         *
         * @var array
         */
        public array $supportedCountries = [],

        /**
         * 是否允许更改国家.
         *
         * @var bool
         */
        public bool $allowChangeCountry = true,

        /**
         * 账户功能.
         *
         * @var AccountFeatures
         */
        public ?AccountFeatures $accountFeatures = null
    ) {}
}
