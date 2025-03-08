<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone;

use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Throwable;

class SecurityVerifyPhoneSecurityCodeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $id,
        protected string $phoneNumber,
        protected string $countryCode,
        protected string $countryDialCode,
        protected string $code
    ) {
    }


    public function createDtoFromResponse(Response $response): SecurityVerifyPhone
    {
        return SecurityVerifyPhone::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return '/account/manage/security/verify/phone/securitycode';
    }

    protected function defaultBody(): array
    {
        return [
            'phoneNumberVerification' => [
                'phoneNumber' => [
                    'id' => $this->id,
                    'number' => $this->phoneNumber,
                    'countryCode' => $this->countryCode,
                    'countryDialCode' => $this->countryDialCode,
                ],
                'securityCode' => [
                    'code' => $this->code,
                ],
                'mode' => 'sms',
            ],
        ];
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        return new VerificationCodeException($response, $senderException?->getMessage());
    }
}
