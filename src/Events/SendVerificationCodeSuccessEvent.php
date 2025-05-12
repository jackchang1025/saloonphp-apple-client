<?php
declare(strict_types=1);
namespace Weijiajia\SaloonphpAppleClient\Events;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SendVerificationCode\SendDeviceSecurityCode;
class SendVerificationCodeSuccessEvent
{
    public function __construct(public AppleId $appleId, public SendDeviceSecurityCode $response)
    {
    }
}
