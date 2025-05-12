<?php
declare(strict_types=1);
namespace Weijiajia\SaloonphpAppleClient\Events;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\VerifyPhoneSecurityCode\VerifyPhoneSecurityCode;
use Weijiajia\SaloonphpAppleClient\DataConstruct\NullData;
class VerifySecurityCodeSuccessEvent
{

    public function __construct(
        public AppleId $appleId,
        public VerifyPhoneSecurityCode|NullData $response
    ) {
    }
}
