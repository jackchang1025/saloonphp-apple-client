<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient;

use Weijiajia\SaloonphpAppleClient\Browser\Document;
use Weijiajia\SaloonphpAppleClient\Browser\Location;
use Weijiajia\SaloonphpAppleClient\Browser\Navigator;
use Weijiajia\SaloonphpAppleClient\Browser\Screen;
use Weijiajia\SaloonphpAppleClient\Browser\Window;
use Weijiajia\SaloonphpAppleClient\Helpers\SecChHeadersService;

class Browser
{

    public Document $document;
    public Navigator $navigator;
    public Screen $screen;
    public Location $location;
    public Window $window;

    protected SecChHeadersService $secChHeadersService;

    public function __construct(
        string $userAgent,
        public string $secFetchDest = "document",
        public string $secFetchMode = "navigate",
        public string $secFetchSite = "none",
        public string $secFetchUser = "?1",
        public string $timezone = "America/New_York",
        public string $acceptEncoding = "gzip, deflate, br",
        public string $acceptLanguage = "en-US,en;q=0.9",
        public string $language = "en-US",
        public string $accept = "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    )
    {

        // Initialize Browser components
        $this->window = new Window(); // Window initializes others
        $this->document = $this->window->document;
        $this->navigator = $this->window->navigator;
        $this->screen = $this->window->screen;
        $this->location = $this->window->location;

        $this->location->setURL("https://www.icloud.com");

        $this->secChHeadersService = new SecChHeadersService($userAgent);

        $this->navigator->setup($userAgent);
        $this->navigator->language = $language;

        // Set timezone if needed globally
        // date_default_timezone_set($this->timezone);
    }

    /**
     * Generates basic browser headers.
     *
     * @param string $userAgent
     * @return array<string, string>
     */
    public function generateHeaders(): array
    {
        $headers = [
            'user-agent' => $this->navigator->userAgent,
            'accept' => $this->accept,
            'accept-encoding' => $this->acceptEncoding,
            'accept-language' => $this->acceptLanguage,
        ];
        $headers = array_merge($headers, $this->secFetchHeaders());
        $headers = array_merge($headers, $this->secChHeadersService->generateAllHeaders());
        return $headers;
    }

    /**
     * Generates Sec-Fetch headers.
     *
     * @return array<string, string>
     */
    private function secFetchHeaders(): array
    {
        return [
            'sec-fetch-dest' => $this->secFetchDest,
            'sec-fetch-mode' => $this->secFetchMode,
            'sec-fetch-site' => $this->secFetchSite,
            'sec-fetch-user' => $this->secFetchUser,
        ];
    }

    /**
     * Updates browser state when navigating to a new URL.
     *
     * @param string $url
     * @return bool Always returns true in this simplified version
     */
    public function onOpen(string $url): bool
    {
        // Update location based on the new URL
        $this->location->setURL($url);
        // Update referer based on the new origin
        $this->document->referer = $this->location->origin ?? '';
        // Update domain based on hostname
        $this->document->domain = $this->location->hostname ?? '';

        return true;
    }
} 