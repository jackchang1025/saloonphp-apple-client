<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Account;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\UpdateName\UpdateName;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class UpdateNameRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        public UpdateName $dto,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/account/manage/name';
    }

    public function createDtoFromResponse(Response $response): UpdateName
    {
        return UpdateName::from($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->dto->toArray();
    }
}
