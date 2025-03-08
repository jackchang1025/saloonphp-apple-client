<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem;

use Weijiajia\SaloonphpAppleClient\Apple;
use Weijiajia\SaloonphpAppleClient\Cookies\CookieAuthenticator;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Resources\Resources;


class ReportProblemConnector extends AppleConnector
{

    public function resolveBaseUrl(): string
    {
        return 'https://reportaproblem.apple.com';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Connection'       => 'Keep-Alive',
            'Content-Type'     => 'application/json',
            'Accept'           => 'application/json, text/plain, */*',
            'Accept-Language'  => 'zh-CN,en;q=0.9,zh;q=0.8',
            'x-apple-rap2-api' => '2.0.1',
            'Sec-Fetch-Site'   => 'same-origin',
            'Sec-Fetch-Mode'   => 'cors',
            'Sec-Fetch-Dest'   => 'empty',
            'Host'             => $this->host(),
            'Referer'          => $this->host(),
            'User-Agent'       => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',
        ];
    }

    public function host()
    {
        return 'reportaproblem.apple.com';
    }

    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
