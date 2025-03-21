<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasSecCh
{
    public function bootHasSecCh(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('sec-ch-ua', '"Not(A:Brand";v="99", "Google Chrome";v="133", "Chromium";v="133"');
        $pendingRequest->headers()->add('sec-ch-ua-mobile', '?0');
        $pendingRequest->headers()->add('sec-ch-ua-platform', '"Windows"');
    }
}