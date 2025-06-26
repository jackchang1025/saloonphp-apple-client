<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Device;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

#[MapOutputName(SnakeCaseMapper::class)]
class DeviceDetail extends Data
{
    public function __construct(
        /** @var string 设备唯一标识符 */
        #[MapName('id')]
        public string $deviceId,

        /** @var null|string 列表图像位置 */
        public ?string $listImageLocation = null,

        /** @var null|string 2倍分辨率列表图像位置 */
        public ?string $listImageLocation2x = null,

        /** @var null|string 3倍分辨率列表图像位置 */
        public ?string $listImageLocation3x = null,

        /** @var null|string 信息框图像位置 */
        public ?string $infoboxImageLocation = null,

        /** @var null|string 2倍分辨率信息框图像位置 */
        public ?string $infoboxImageLocation2x = null,

        /** @var null|string 3倍分辨率信息框图像位置 */
        public ?string $infoboxImageLocation3x = null,

        /** @var null|bool 是否为当前使用的设备 */
        public ?bool $currentDevice = null,

        /** @var null|bool 是否正在等待移除 */
        public ?bool $removalPending = null,

        /** @var null|string 访问设备详情的HTTP方法 */
        public ?string $deviceDetailHttpMethod = null,

        /** @var null|string 设备详情URI */
        public ?string $deviceDetailUri = null,

        /** @var null|string 操作系统及版本 */
        public ?string $osAndVersion = null,

        /** @var null|bool 是否为iCloud设备 */
        public ?bool $iCloudDevice = null,

        /** @var null|bool Apple Pay卡片是否正在等待移除 */
        public ?bool $applePayCardRemovalPending = null,

        /** @var null|bool 是否隐藏更改密码链接 */
        public ?bool $suppressChangePasswordLink = null,

        /** @var null|bool 是否显示备份状态 */
        public ?bool $showBackupStatus = null,

        /** @var null|bool 是否显示序列号 */
        public ?bool $showSerialNumber = null,

        /** @var null|bool 是否允许移除 */
        public ?bool $allowRemoval = null,

        /** @var null|string 不兼容原因键部分 */
        public ?string $incompatibilityReasonKeyPart = null,

        /** @var null|string 最后登录日期 */
        public ?string $lastSignedInDate = null,

        /** @var null|string 国际移动设备识别码 */
        public ?string $imei = null,

        /** @var null|string 移动设备识别码 */
        public ?string $meid = null,

        /** @var null|bool 是否支持查找我的iPhone功能 */
        public ?bool $fmipCapable = null,

        /** @var null|bool 是否支持备份功能 */
        public ?bool $backupCapable = null,

        /** @var null|string 备份UUID */
        public ?string $backupUuid = null,

        /** @var null|bool 是否为不支持的设备 */
        public ?bool $unsupported = null,

        /** @var null|string 设备序列号 */
        public ?string $serialNumber = null,

        /** @var null|string 设备型号名称 */
        public ?string $modelName = null,

        /** @var null|string 设备名称 */
        public ?string $name = null,

        /** @var null|bool 是否支持验证码 */
        public ?bool $supportsVerificationCodes = null,

        /** @var null|bool 账户是否支持验证码 */
        public ?bool $accountSupportsVerificationCodes = null,

        /** @var null|bool 账户是否启用HSA2(双重认证) */
        public ?bool $accountHSA2 = null,

        /** @var null|bool 是否为推送设备 */
        public ?bool $pushDevice = null,

        /** @var null|bool 是否有Apple Pay卡片 */
        public ?bool $hasApplePayCards = null,

        /** @var null|bool 是否有激活的Surf账户 */
        public ?bool $hasActiveSurfAccount = null,

        /** @var null|bool 是否在认证期间未加入CDP */
        public ?bool $hasNotJoinedCDPDuringAuth = null,

        /** @var null|bool 是否支持认证完成后加入CDP */
        public ?bool $supportsCDPJoinAfterAuthComplete = null,

        /** @var null|string 设备类别显示名称 */
        public ?string $deviceClassDisplayName = null,

        /** @var null|string 查找我的iPhone设备ID */
        public ?string $fmipDeviceId = null,

        /** @var null|bool 是否启用查找我的iPhone */
        public ?bool $fmipEnabled = null,

        /** @var null|bool 是否为主要设备 */
        public ?bool $primary = null,

        /** @var null|bool 是否为次要设备 */
        public ?bool $secondary = null,

        /** @var null|string 完整的设备类别描述 */
        public ?string $qualifiedDeviceClass = null,

        /** @var null|string 设备类别 */
        public ?string $deviceClass = null,

        /** @var null|string 操作系统类型 */
        public ?string $os = null,

        /** @var null|string 设备颜色 */
        public ?string $color = null,

        /** @var null|string 外壳颜色 */
        public ?string $enclosureColor = null,

        /** @var null|bool 是否为受信任设备 */
        public ?bool $trustedDevice = null,

        /** @var null|string 操作系统版本 */
        public ?string $osVersion = null,

        /** @var null|string 设备类型 */
        public ?string $type = null,

        /** @var null|bool 是否为不受信任设备 */
        public ?bool $untrusted = null
    ) {}
}
