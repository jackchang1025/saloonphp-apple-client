<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Widget;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;


class Account extends Request 
{
    protected Method $method = Method::GET;

    public function __construct(
        public string $widgetKey,
        public string $referer,
        public string $appContext = 'account',
        public string $lv = '0.3.17',
        public string $v = '3',
        public string $roleType = 'Agent',
        
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/widget/account/?roleType='.$this->roleType.'&lv='.$this->lv.'&widgetKey='.$this->widgetKey.'&v='.$this->v.'&appContext='.$this->appContext;
    }

    protected function defaultHeaders(): array
    {
        // Sec-Fetch-Dest: iframe
        // Sec-Fetch-Mode: navigate
        // Sec-Fetch-Site: cross-site
        // Sec-Fetch-Storage-Access: active
        // Sec-Fetch-User: ?1
        // Upgrade-Insecure-Requests: 1
        // sec-ch-ua: "Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"
        // sec-ch-ua-mobile: ?0

        return [
            'Accept'=>'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Referer' => $this->referer,
            'Upgrade-Insecure-Requests' => '1',
            'Sec-Fetch-Dest' => 'iframe',
            'Sec-Fetch-Mode' => 'navigate',
            'Sec-Fetch-Site' => 'cross-site',
            'Sec-Fetch-Storage-Access' => 'active',
            'Sec-Fetch-User' => '?1',
        ];
    }
}