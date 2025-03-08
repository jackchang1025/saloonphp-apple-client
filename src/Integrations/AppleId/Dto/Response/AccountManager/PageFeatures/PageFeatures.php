<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\PageFeatures;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PageFeatures extends Data
{
    public function __construct(
        /** @var bool 是否显示账户删除选项 */
        public bool $showAccountDeletion = false,

        /** @var bool 是否显示隐私设置 */
        public bool $showPrivacySettings = true,

        /** @var bool 是否显示安全推荐 */
        public bool $showSecurityRecommendations = true,

        /** @var bool 是否显示设备列表 */
        public bool $showDevicesList = true,

        /** @var bool 是否显示家庭共享设置 */
        public bool $showFamilySettings = false,

        /** @var array 页面自定义选项 */
        public array $customizations = [],

        /** @var array 功能开关 */
        public array $featureFlags = [],

        /** @var array UI配置 */
        public array $uiConfiguration = []
    ) {
    }
}
