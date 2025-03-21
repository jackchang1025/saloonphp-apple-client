<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;

trait HasRequestedWith
{
    public function bootHasRequestedWith(PendingRequest $pendingRequest)
    {
        $pendingRequest->headers()->add('X-Requested-With', 'XMLHttpRequest');
    }
}