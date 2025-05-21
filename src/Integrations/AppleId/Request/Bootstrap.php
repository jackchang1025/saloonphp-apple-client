<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request;

use Saloon\Enums\Method;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class Bootstrap extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/bootstrap/portal';
    }
}
