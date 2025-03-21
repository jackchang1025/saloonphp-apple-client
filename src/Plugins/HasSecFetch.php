<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasSecFetch
{
    public function bootHasSecFetch(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('sec-fetch-dest', 'empty');
        $pendingRequest->headers()->add('sec-fetch-mode', 'cors');
        $pendingRequest->headers()->add('sec-fetch-site', 'same-origin');
    }
}