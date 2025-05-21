<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Preferences;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class PrivacyPreferences extends Data
{
    public function __construct(
        /** @var bool 是否允许设备诊断和使用数据收集 */
        public bool $allowDeviceDiagnosticsAndUsage,

        /** @var bool 是否允许 iCloud 数据分析 */
        public bool $allowICloudDataAnalytics,

        /** @var bool 是否允许与第三方开发者共享数据 */
        public bool $allowShareThirdPartyDevelopers
    ) {}
}
