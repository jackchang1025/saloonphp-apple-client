<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account;

use Saloon\Http\Connector;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\Resources\Resources;
use Weijiajia\SaloonphpLogsPlugin\HasLogger;

class AccountConnector extends Connector
{

    public function __construct(
    ) {

    }

    public function resolveBaseUrl(): string
    {
        return 'https://account.apple.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection' => 'Keep-Alive',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json, text/plain, */*',
            // 'Accept-Language' => 'zh-CN,en;q=0.9,zh;q=0.8',
            'Accept-Language' => 'en,zh-CN;q=0.9,zh;q=0.8',
            'X-Apple-I-Request-Context' => 'ca',
            // 'X-Apple-I-TimeZone' => 'Asia/Shanghai',
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
