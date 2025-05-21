<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\ValidatePassword\ValidatePassword;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class AuthenticatePasswordRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected string $password) {}

    public function resolveEndpoint(): string
    {
        return '/authenticate/password';
    }

    public function createDtoFromResponse(Response $response): ValidatePassword
    {
        return ValidatePassword::from($response->json());
    }

    public function hasRequestFailed(Response $response): bool
    {
        if ($response->clientError() && 409 === $response->status()) {
            return false;
        }

        return $response->serverError() || $response->clientError();
    }

    protected function defaultBody(): array
    {
        return [
            'password' => $this->password,
        ];
    }
}
