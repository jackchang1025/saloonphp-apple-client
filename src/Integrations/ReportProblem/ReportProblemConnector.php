<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem;

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
            'Accept-Language'  => $this->browser()->language,
            'x-apple-rap2-api' => '2.0.1',
            'Host'             => 'reportaproblem.apple.com',
            'Referer'          => 'https://reportaproblem.apple.com',
            'User-Agent'       => $this->browser()->userAgent,
        ];
    }
    public function getResources(): Resources
    {
        return new Resources($this);
    }
}
