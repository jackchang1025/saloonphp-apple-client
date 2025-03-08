<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Security;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Device extends Data
{
    public function __construct(
        /** @var bool 是否与 Apple ID 相同 */
        public bool $sameAsAppleId,

        /** @var bool 是否已验证 */
        public bool $vetted,

        /** @var string 在线状态 (online/offline) */
        public string $liveStatus,

        /** @var string 设备名称/显示名称 */
        public string $name,

        /** @var string 设备类型名称 */
        public string $typeName,

        /** @var int 设备ID */
        public int $id,

        /** @var string 设备类型 */
        public string $type
    ) {
    }
}
