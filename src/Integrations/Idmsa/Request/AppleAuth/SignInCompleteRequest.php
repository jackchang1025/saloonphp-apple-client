<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Throwable;
use Weijiajia\SaloonphpAppleClient\Exception\SignInException;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\SignIn\SignInComplete;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInComplete as SignInCompleteResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class SignInCompleteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public SignInComplete $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/signin/complete?isRememberMeEnabled=true';
    }

    public function createDtoFromResponse(Response $response): SignInCompleteResponse
    {
        return SignInCompleteResponse::from($response->json());
    }


    public function defaultBody(): array
    {
        return [
            'accountName' => $this->data->account,
            'm1'          => $this->data->m1,
            'm2'          => $this->data->m2,
            'c'           => $this->data->c,
            'rememberMe'  => $this->data->rememberMe,
        ];
    }

    public function hasRequestFailed(Response $response): ?bool
    {
        return $response->status() !== 409;
    }
}
