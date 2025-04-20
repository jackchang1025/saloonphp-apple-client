<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Resources\Resources;

class BuyTvAppleConnector extends AppleConnector
{

    public function resolveBaseUrl(): string
    {
        return 'https://buy.tv.apple.com/';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept'                    => '*/*',
            'Connection'                => 'keep-alive',
            'Host'                      => 'buy.tv.apple.com',
            'Origin'                    => 'https://tv.apple.com',
            'Referer'                   => 'https://tv.apple.com/',
            'User-Agent'                => $this->browser()->userAgent,
            //这个值表示:
            // 美国区域商店 (143441)
            // 英语界面 (-1)
            // 协议版本 8 (,8)
            //身份验证流程影响
            // 影响账户创建时的默认区域设置
            // 决定可用的支付方式和验证选项
            // 内容访问控制
            // 在 Apple TV+ 等服务中控制可访问的内容库
            // 影响试用期和订阅选项
            // 合规要求
            // 不同地区有不同的年龄限制和内容规定
            // 调整隐私政策和数据处理方式
            // 正确设置这个头部对于模拟 Apple TV 网站注册流程至关重要，确保遵循与浏览器一致的地区和语言设置，避免区域验证错误。
            'X-Apple-Store-Front'  => '143441-1,8'//143441
        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
