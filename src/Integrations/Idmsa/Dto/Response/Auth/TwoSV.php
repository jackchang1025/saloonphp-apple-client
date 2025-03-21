<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class TwoSV extends Data
{
    /**
     * @param array $supportedPushModes 支持的推送模式
     * @param PhoneNumberVerification $phoneNumberVerification 电话号码验证数据
     * @param array $authFactors 认证因素
     * @param string $source_returnurl 源返回URL
     * @param int $sourceAppId 源应用ID
     */
    public function __construct(
        public array $supportedPushModes,
        public array $authFactors,
        public string $source_returnurl,
        public int $sourceAppId,
        public array $emailVerification = [],
        public ?PhoneNumberVerification $phoneNumberVerification = null
    ) {
    }
}
