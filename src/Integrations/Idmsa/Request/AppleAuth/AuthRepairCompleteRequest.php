<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Weijiajia\SaloonphpAppleClient\DataConstruct\NullData;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class AuthRepairCompleteRequest extends Request
{
    protected Method $method = Method::POST;

    public function createDtoFromResponse(Response $response): NullData
    {
        return NullData::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/repair/complete';
    }
}
