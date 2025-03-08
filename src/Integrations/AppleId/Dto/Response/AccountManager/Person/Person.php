<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Person;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Person extends Data
{
    public function __construct(
        /** @var string 姓名 */
        public string $name = '',

        /** @var string|null 生日 */
        public ?string $birthday = null,

        /** @var string|null 性别 */
        public ?string $gender = null,

        /** @var PrimaryAddress|null 主要地址 */
        public ?PrimaryAddress $primaryAddress = null,

        /** @var array 电话号码列表 */
        public array $phoneNumbers = [],

        /** @var array 其他地址列表 */
        public array $addresses = [],

        /** @var bool 是否已验证 */
        public bool $verified = false,

        /** @var array 其他个人信息 */
        public array $additionalInfo = []
    ) {
    }
}
