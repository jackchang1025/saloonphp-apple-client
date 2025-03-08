<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Preferences;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class MarketingPreferences extends Data
{
    public function __construct(
        /** @var bool 是否接收 Apple 更新通知 */
        public bool $appleUpdates,

        /** @var bool 是否接收 iTunes 更新通知 */
        public bool $iTunesUpdates,

        /** @var bool 是否接收 Apple News 通知 */
        public bool $appleNews,

        /** @var bool 是否接收 Apple Music 通知 */
        public bool $appleMusic
    ) {
    }
}
