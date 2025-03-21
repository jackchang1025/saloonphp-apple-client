<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleAuthenticationConnector\Dto\Response\SignInInit;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SignInInitRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected string $account)
    {
    }

    public function createDtoFromResponse(Response $response): SignInInit
    {
        return SignInInit::from($response->json());
    }
    public function defaultBody(): array
    {
        return[
            'email' => $this->account,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/init';
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'text/html',
            'Content-Type' => 'application/json',
        ];
    }
}
