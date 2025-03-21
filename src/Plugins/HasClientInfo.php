<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;
use DateTime;
use DateTimeZone;

trait HasClientInfo
{
    public function bootHasClientInfo(PendingRequest $pendingRequest): void
    {

        $pendingRequest->middleware()->onRequest(function (PendingRequest $pendingRequest) {
            $userAgent = $pendingRequest->headers()->get('User-Agent');
            $language = $pendingRequest->headers()->get('Accept-Language');
            if($language){
                $language = explode(',', $language)[0];
            }
            
            $timezone = $pendingRequest->headers()->get('X-Apple-I-Timezone');
            if($timezone){
                
                $dateTime = new DateTime('now', new DateTimeZone($timezone));
                $timezone = "GMT{$dateTime->format('O')}";
            }

            $clientInfo = [
                'U' => $userAgent,
                'L' => $language,
                'Z' => $timezone,
                'V' => '1.1',
                'F' => '',
            ];
            
            $pendingRequest->headers()->add('x-apple-i-fd-client-info', json_encode($clientInfo));
        });

    }
}