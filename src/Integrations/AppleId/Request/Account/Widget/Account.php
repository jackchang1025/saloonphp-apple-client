<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Widget;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;


class Account extends Request 
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $widgetKey = 'af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3',
        public string $appContext = 'account',
        public string $lv = '0.3.17',
        public string $v = '3',
        public string $roleType = 'Agent',
        public ?string $referer = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/widget/account/?roleType='.$this->roleType.'&lv='.$this->lv.'&widgetKey='.$this->widgetKey.'&v='.$this->v.'&appContext='.$this->appContext;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Referer' => $this->referer,
            'Host' => 'appleid.apple.com',
            'User-Agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/131.0.6778.73 Mobile/15E148 Safari/604.1',
            'Upgrade-Insecure-Requests' => '1',
            'Sec-Fetch-Dest' => 'iframe',
            'Sec-Fetch-Mode' => 'navigate',
            'Sec-Fetch-Site' => 'cross-site',
        ];
    }
}