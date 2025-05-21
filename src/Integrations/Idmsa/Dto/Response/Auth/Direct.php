<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Direct extends Data
{
    /**
     * @param string $scriptSk7Url      SK7脚本的URL
     * @param string $scriptUrl         主脚本的URL
     * @param string $module            模块名称
     * @param bool   $isReact           是否为React组件
     * @param string $authUserType      认证用户类型
     * @param bool   $hasTrustedDevices 是否有受信任的设备
     * @param TwoSV  $twoSV             双重验证相关数据
     * @param string $referrerQuery     引荐查询字符串
     * @param string $urlContext        URL上下文
     * @param string $tag               HTML标签
     * @param string $authType          认证类型
     * @param string $authInitialRoute  初始认证路由
     * @param string $appleIDUrl        Apple ID URL
     */
    public function __construct(
        public string $scriptSk7Url,
        public string $scriptUrl,
        public string $module,
        public bool $isReact,
        public string $authUserType,
        public bool $hasTrustedDevices,
        public TwoSV $twoSV,
        public string $referrerQuery,
        public string $urlContext,
        public string $tag,
        public string $authType,
        public string $authInitialRoute,
        public string $appleIDUrl
    ) {}
}
