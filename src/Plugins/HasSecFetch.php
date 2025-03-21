<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasSecFetch
{
    public function bootHasSecFetch(PendingRequest $pendingRequest): void
    {
        
        $pendingRequest->headers()->add('Sec-Fetch-Dest', 'empty');
        $pendingRequest->headers()->add('Sec-Fetch-Mode', 'cors');
        $pendingRequest->headers()->add('Sec-Fetch-Site', 'same-origin');
        $pendingRequest->headers()->add('Sec-Fetch-Storage-Access', 'active');
        $pendingRequest->headers()->add('Sec-Fetch-User', '?1');
    }
}