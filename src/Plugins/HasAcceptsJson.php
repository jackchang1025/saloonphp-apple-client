<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasAcceptsJson
{
    public function bootHasAcceptsJson(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('Accept', 'application/json, text/plain, */*');
    }
}
