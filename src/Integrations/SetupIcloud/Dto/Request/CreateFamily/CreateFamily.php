<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\CreateFamily;

use Spatie\LaravelData\Data;

class CreateFamily extends Data
{
    public function __construct(
        public readonly string $organizerAppleId,//主账号
        public readonly string $organizerAppleIdForPurchases,//付款账号
        public readonly string $organizerAppleIdForPurchasesPassword,//付款账号密码
        public readonly bool $organizerShareMyLocationEnabledDefault = true,
        public readonly int $iTunesTosVersion = 284005
    ) {
    }
}
