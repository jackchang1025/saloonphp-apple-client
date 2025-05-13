<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient;

use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;
use Psr\Log\LoggerInterface;
use Saloon\Traits\RequestProperties\HasConfig;
use Saloon\Traits\RequestProperties\HasMiddleware;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId as AppleIdContract;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\SaloonphpAppleClient\Resource\AppleId\AppleIdResource;
use Weijiajia\SaloonphpAppleClient\Resource\Icloud\IcloudResource;
use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\Helpers\GeneratePassword;
use Weijiajia\SaloonphpAppleClient\Contracts\Phone;
use Weijiajia\SaloonphpAppleClient\Resource\Account\AccountResource;
use Psr\EventDispatcher\EventDispatcherInterface;
use Weijiajia\SaloonphpAppleClient\Trait\ProvidesAppleIdCapabilities;

class AppleId implements AppleIdContract
{
    use ProvidesAppleIdCapabilities;

    public function __construct(
        string $appleId,
        ?string $password = null,
    ) {
        $this->appleId = $appleId;
        $this->password = $password;
    }
}
