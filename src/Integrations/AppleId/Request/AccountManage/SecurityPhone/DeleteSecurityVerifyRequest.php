<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\SecurityPhone;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\DeleteSecurityVerify;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class DeleteSecurityVerifyRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function __construct(protected string $id) {}

    public function createDtoFromResponse(Response $response): DeleteSecurityVerify
    {
        return DeleteSecurityVerify::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return "/account/manage/security/phone/{$this->id}";
    }

    protected function defaultBody(): array
    {
        return [];
    }
}
