<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn;

use Illuminate\Support\Carbon;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class SignInComplete extends Data
{
    public function __construct(
        public string $authType,
        public ?Carbon $expiresAt = null
    ) {
        if (null === $this->expiresAt) {
            $this->expiresAt = Carbon::now()->addSeconds(30);
        }
    }

    public static function fromResponse(Response $response): static
    {
        return new self(
            authType: $response->json('authType'),
            expiresAt: Carbon::now()->addSeconds(30)
        );
    }

    public function isValid(): bool
    {
        return $this->expiresAt?->isFuture();
    }
}
