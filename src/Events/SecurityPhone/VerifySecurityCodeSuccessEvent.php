<?php
declare(strict_types=1);
namespace Weijiajia\SaloonphpAppleClient\Events\SecurityPhone;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\SecurityVerifyPhone\SecurityVerifyPhone;
class VerifySecurityCodeSuccessEvent
{

    public function __construct(
        public AppleId $appleId,
        public SecurityVerifyPhone $response
    ) {
    }
}
