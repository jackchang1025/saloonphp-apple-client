<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth\VerifyEmailSecurityCode\VerifyEmailSecurityCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\VerifyEmailSecurityCode\VerifyEmailSecurityCodeResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class VerifyEmailSecurityCodeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(public VerifyEmailSecurityCode $data) {}

    public function createDtoFromResponse(Response $response): VerifyEmailSecurityCodeResponse
    {
        return VerifyEmailSecurityCodeResponse::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/verify/email/securitycode';
    }

    public function defaultBody(): array
    {
        return $this->data->toArray();
    }
}
