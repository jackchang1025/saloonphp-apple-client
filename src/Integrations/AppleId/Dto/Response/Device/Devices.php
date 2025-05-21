<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Devices extends Data
{
    public function __construct(
        /** @var DataCollection 设备列表集合 */
        #[DataCollectionOf(Device::class)]
        public DataCollection $devices,

        /** @var string HSA2已登录设备的链接 */
        public string $hsa2SignedInDevicesLink,

        /** @var bool 是否隐藏更改密码链接 */
        public bool $suppressChangePasswordLink,
    ) {}
}
