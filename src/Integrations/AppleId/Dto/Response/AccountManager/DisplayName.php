<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class DisplayName extends Data
{
    public function __construct(
        /** @var string 显示名称 */
        public string $name = '',

        /** @var string 格式化的显示名称 */
        public string $formattedName = '',

        /** @var bool 是否可编辑 */
        public bool $editable = false,

        /** @var array 显示选项 */
        public array $displayOptions = [],

        /** @var string|null 昵称 */
        public ?string $nickname = null,

        /** @var bool 是否显示在 iCloud 中 */
        public bool $visibleInICloud = true,

        /** @var array 显示规则 */
        public array $displayRules = []
    ) {
    }
}
