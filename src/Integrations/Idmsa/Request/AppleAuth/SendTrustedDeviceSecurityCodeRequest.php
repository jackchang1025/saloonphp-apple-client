<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendDeviceSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class SendTrustedDeviceSecurityCodeRequest extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/verify/trusteddevice/securitycode';
    }

    public function createDtoFromResponse(Response $response): SendDeviceSecurityCode
    {
        return SendDeviceSecurityCode::from($response->json());
    }

    public function hasRequestFailed(Response $response): ?bool
    {
        if ($response->clientError() && 412 === $response->status()) {
            return false;
        }

        return $response->serverError() || $response->clientError();
    }
}
