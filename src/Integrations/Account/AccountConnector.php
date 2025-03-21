<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\Resources\Resources;

class AccountConnector extends AppleConnector
{

    public function resolveBaseUrl(): string
    {
        return 'https://account.apple.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection' => 'Keep-Alive',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-excha',
            'Accept-Language' => 'en,zh-CN;q=0.9,zh;q=0.8',
            'X-Apple-I-Request-Context' => 'ca',
            'Sec-Fetch-Site' => 'same-origin',
            'Sec-Fetch-Mode' => 'cors',
            'Sec-Fetch-Dest' => 'empty',
            'Referer' => $this->resolveBaseUrl(),
            'Origin' => $this->resolveBaseUrl(),
            'Host' => 'account.apple.com',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',
        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
