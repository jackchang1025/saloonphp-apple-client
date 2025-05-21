<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Events;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\DataConstruct\NullData;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\VerifyPhoneSecurityCode\VerifyPhoneSecurityCode;

class VerifySecurityCodeSuccessEvent
{
    public function __construct(
        public AppleId $appleId,
        public NullData|VerifyPhoneSecurityCode $response
    ) {}
}
