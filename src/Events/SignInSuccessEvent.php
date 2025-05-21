<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Events;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInComplete;

class SignInSuccessEvent
{
    /**
     * Create a new event instance.
     */
    public function __construct(public AppleId $appleId, public SignInComplete $response) {}
}
