<?php
declare(strict_types=1);
namespace Weijiajia\SaloonphpAppleClient\Events\Authenticated;
    
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;

class AuthenticatedEvent
{

    public function __construct(public AppleId $appleId)
    {
    }
}