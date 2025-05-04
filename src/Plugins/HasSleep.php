<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;
use Weijiajia\SaloonphpAppleClient\Contracts\HasSleepInterface;

trait HasSleep
{

    public function sleep(): float|int
    {
        return 0;
    }

    public function bootHasSleep(PendingRequest $pendingRequest): void
    {
        $request = $pendingRequest->getRequest();
        $connector = $pendingRequest->getConnector();

        if (!$connector instanceof HasSleepInterface && !$request instanceof HasSleepInterface) {
            throw new \Exception('connector or request must implement '.HasSleepInterface::class);
        }

        $hasSleep = $request instanceof HasSleepInterface ? $request : $connector;

        sleep($hasSleep->sleep());
    }
}
