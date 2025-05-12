<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn;

use Illuminate\Support\Carbon;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Saloon\Http\Response;

class SignInComplete extends Data
{
    public function __construct(
        public string $authType,
        public ?Carbon $expiresAt = null
    ) {
        if ($this->expiresAt === null) {
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
