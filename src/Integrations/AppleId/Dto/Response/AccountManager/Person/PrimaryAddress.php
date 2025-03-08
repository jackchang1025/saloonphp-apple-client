<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

/**
 * 主地址数据类
 */
class PrimaryAddress extends Data
{
    public function __construct(
        /**
         * 是否为默认地址
         * @var bool
         */
        public bool $defaultAddress = false,

        /**
         * 州省是否无效
         * @var bool
         */
        public bool $stateProvinceInvalid = false,

        /**
         * 是否为日本地址
         * @var bool
         */
        public bool $japanese = false,

        /**
         * 是否为韩国地址
         * @var bool
         */
        public bool $korean = false,

        /**
         * 格式化的地址
         * @var array
         */
        public array $formattedAddress = [],

        /**
         * 是否为主要地址
         * @var bool
         */
        public bool $primary = false,

        /**
         * 是否为配送地址
         * @var bool
         */
        public bool $shipping = false,

        /**
         * 国家代码
         * @var string
         */
        public string $countryCode = '',

        /**
         * 国家名称
         * @var string
         */
        public string $countryName = '',

        /**
         * 州省列表
         * @var array
         */
        public array $stateProvinces = [],

        /**
         * 是否为美国地址
         * @var bool
         */
        public bool $usa = false,

        /**
         * 是否为加拿大地址
         * @var bool
         */
        public bool $canada = false,

        /**
         * 完整地址
         * @var string
         */
        public string $fullAddress = '',

        /**
         * 是否为首选地址
         * @var bool
         */
        public bool $preferred = false,

        /**
         * 地址 ID
         * @var string
         */
        public string $id = '',

        /**
         * 地址类型
         * @var string
         */
        public string $type = '',
    ) {
    }
}
