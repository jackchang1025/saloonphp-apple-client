<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Helpers\Fingerprint;
use Weijiajia\SaloonphpAppleClient\Services\DCHelper;

trait HasClientInfo
{
    protected bool $isDCHelper = true;

    public function isDCHelper(): bool
    {
        return $this->isDCHelper;
    }

    public function withDCHelper(bool $isDCHelper = true): self
    {
        $this->isDCHelper = $isDCHelper;

        return $this;
    }

    public function bootHasClientInfo(PendingRequest $pendingRequest): void
    {
        $pendingRequest->middleware()->onRequest(function (PendingRequest $pendingRequest) {
            if ($pendingRequest->headers()->get('X-Apple-I-FD-Client-Info')) {
                return;
            }

            $userAgent = $pendingRequest->headers()->get('User-Agent');

            $acceptLanguage = $pendingRequest->headers()->get('Accept-Language');
            if ($acceptLanguage) {
                $language = explode(',', $acceptLanguage)[0];
            }

            $timezone = $pendingRequest->headers()->get('X-Apple-I-Timezone');
            if (!$timezone) {
                throw new \RuntimeException('timezone is required');
            }

            $dateTime = new \DateTime('now', new \DateTimeZone($timezone));
            // $browser = new Browser(userAgent: $userAgent, acceptLanguage: $acceptLanguage, timezone: $timezone,language: $language);
            // $DCHelper = new DCHelper($browser);

            $f = $this->isDCHelper() ? Fingerprint::createFingerprint($timezone) : '';
            $clientInfo = [
                'U' => $userAgent,
                'L' => $language,
                'Z' => "GMT{$dateTime->format('P')}",
                'V' => '1.1',
                'F' => $f,
            ];

            $pendingRequest->headers()->add('X-Apple-I-FD-Client-Info', json_encode($clientInfo));
        });
    }
}
