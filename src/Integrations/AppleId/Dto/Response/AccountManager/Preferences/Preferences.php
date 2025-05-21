<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Preferences;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Preferences extends Data
{
    public function __construct(
        /** @var string 首选语言 */
        public string $preferredLanguage = '',

        /** @var MarketingPreferences 营销偏好设置 */
        public ?MarketingPreferences $marketingPreferences = null,

        /** @var PrivacyPreferences 隐私偏好设置 */
        public ?PrivacyPreferences $privacyPreferences = null,

        /** @var string 时区 */
        public string $timeZone = '',

        /** @var string 国家/地区 */
        public string $country = '',

        /** @var bool 是否启用RTL显示 */
        public bool $enableRTL = false,

        /** @var array 通知设置 */
        public array $notifications = [],

        /** @var array 隐私设置 */
        public array $privacy = [],

        /** @var string 日期格式 */
        public string $dateFormat = '',

        /** @var string 时间格式 */
        public string $timeFormat = ''
    ) {}
}
