<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class RepairOptions extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $xAppleWidgetKey) {}

    public function resolveEndpoint(): string
    {
        return '/account/manage/repair/options';
    }

    public function defaultHeaders(): array
    {
        return [
            'X-Apple-Widget-Key' => $this->xAppleWidgetKey,
        ];
    }
}
