<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendPhoneVerificationCode;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SendPhoneSecurityCodeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(protected int $id)
    {
    }

    public function createDtoFromResponse(Response $response): SendPhoneVerificationCode
    {
        return SendPhoneVerificationCode::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/verify/phone';
    }

    protected function defaultBody(): array
    {
        return[
            'phoneNumber' => [
                'id' => $this->id,
            ],
            'mode' => 'sms',
        ];
    }
}
