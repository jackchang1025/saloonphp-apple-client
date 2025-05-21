<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\AddFamilyMember;

use Spatie\LaravelData\Data;

class AddFamilyMember extends Data
{
    /**
     * @param string $appleId                        家庭成员的Apple ID
     * @param string $password                       家庭成员的密码
     * @param string $verificationToken              验证令牌，用于确认添加请求的合法性
     * @param string $appleIdForPurchases            这是用于购买内容的 Apple ID。通常情况下，这个值与$appleId相同，表示家庭成员使用同一个Apple ID进行购买
     * @param string $preferredAppleId               这是首选的Apple ID。在某些情况下，用户可能会有多个Apple ID，这个参数指定了在家庭设置中优先使用的Apple ID
     * @param bool   $shareMyLocationEnabledDefault  是否默认启用位置共享，默认为true
     * @param bool   $shareMyPurchasesEnabledDefault 是否默认启用购买内容共享，默认为true
     */
    public function __construct(
        public string $appleId,
        public string $password,
        public string $appleIdForPurchases,
        public string $verificationToken,
        public string $preferredAppleId,
        public bool $shareMyLocationEnabledDefault = true,
        public bool $shareMyPurchasesEnabledDefault = true,
    ) {}
}
