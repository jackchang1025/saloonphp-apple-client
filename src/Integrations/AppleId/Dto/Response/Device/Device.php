<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

#[MapOutputName(SnakeCaseMapper::class)]
class Device extends Data
{
    public function __construct(
        /** @var string 设备唯一标识符 */
        #[MapName('id')]
        public string $deviceId,

        /** @var null|string 设备名称 */
        public ?string $name,

        /** @var null|string 设备类别，如iPhone、iPad、Mac等 */
        public ?string $deviceClass,

        /** @var null|string 完整的设备类别描述 */
        public ?string $qualifiedDeviceClass,

        /** @var null|string 设备型号名称，如iPhone 13 Pro等 */
        public ?string $modelName,

        /** @var null|string 操作系统类型，如iOS、iPadOS、macOS等 */
        public ?string $os,

        /** @var null|string 操作系统版本号 */
        public ?string $osVersion,

        /** @var bool 是否支持验证码功能 */
        public bool $supportsVerificationCodes,

        /** @var bool 是否为当前使用的设备 */
        public bool $currentDevice,

        /** @var bool 是否为不支持的设备 */
        public bool $unsupported,

        /** @var bool 是否有Apple Pay卡片 */
        public bool $hasApplePayCards,

        /** @var bool 是否有激活的Surf账户 */
        public bool $hasActiveSurfAccount,

        /** @var bool 是否正在等待移除 */
        public bool $removalPending,

        /** @var null|string 列表图像位置 */
        public ?string $listImageLocation,

        /** @var null|string 2倍分辨率列表图像位置 */
        public ?string $listImageLocation2x,

        /** @var null|string 3倍分辨率列表图像位置 */
        public ?string $listImageLocation3x,

        /** @var null|string 信息框图像位置 */
        public ?string $infoboxImageLocation,

        /** @var null|string 2倍分辨率信息框图像位置 */
        public ?string $infoboxImageLocation2x,

        /** @var null|string 3倍分辨率信息框图像位置 */
        public ?string $infoboxImageLocation3x,

        /** @var null|string 设备详情URI */
        public ?string $deviceDetailUri,

        /** @var null|string 访问设备详情的HTTP方法 */
        public ?string $deviceDetailHttpMethod,

        /** @var null|DeviceDetail 设备详细信息 */
        public ?DeviceDetail $deviceDetail = null
    ) {}
}
