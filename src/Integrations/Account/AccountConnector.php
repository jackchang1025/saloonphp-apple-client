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
            'Accept-Language' => $this->appleId()->browser()->language,
            'X-Apple-I-Request-Context' => 'ca',
            'Referer' => $this->resolveBaseUrl(),
            'Origin' => $this->resolveBaseUrl(),
            'Host' => 'account.apple.com',
            'User-Agent' => $this->appleId()->browser()->userAgent,
        ];
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
