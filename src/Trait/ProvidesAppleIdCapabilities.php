<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;
use Illuminate\Support\Traits\Conditionable;
use Saloon\Traits\RequestProperties\HasConfig;

trait ProvidesAppleIdCapabilities
{
    // Use all the individual functionality Traits
    use HandlesAppleIdentity;
    use ProvidesCountry;
    use ProvidesLogger;
    use ProvidesDebug;
    use ProvidesCookieJar;
    use ProvidesHeaderSynchronizeDriver;
    use ProvidesProxySplQueue;          // Depends on ProvidesCountry, ProvidesDebug, HasMiddleware, ProvidesLogger, proxyManager()
    use ProvidesBrowserEmulation;       // Depends on ProvidesProxySplQueue, ProvidesLogger, ProvidesDebug, HasMiddleware, ipAddressManager()
    use ManagesTrustedPhones;           // Depends on logger() (optional)
    use ProvidesEventDispatcher;
    use ProvidesAppleResources;
    use HasConfig;
    use Conditionable;
    use ProvidesMiddleware;
    use AccountTypeIdentifier;
    use HandlesPhoneNumbers;
    // --- Abstract Method Requirements ---
    // Classes using this Trait MUST provide implementations for these,
    // typically by interacting with a service container (like Laravel's).
}