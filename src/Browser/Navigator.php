<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Browser;


class Navigator
{

    public function __construct(
        public string $appCodeName = "Mozilla",
        public string $appName = "Netscape",
        public ?string $appVersion = null,
        public bool $cookieEnabled = true,
        public bool $onLine = true,
        public string $productSub = "20030107",
        public ?string $platform = null,
        public string $language = "en-US",
        public array $plugins = [
            ["name" => "PDF Viewer"],
            ["name" => "Chrome PDF Viewer"],
            ["name" => "Chromium PDF Viewer"],
            ["name" => "Microsoft Edge PDF Viewer"],
            ["name" => "WebKit built-in PDF"],
        ],
        public ?string $userAgent = null,
    )
    {

    }

    public function setup(string $userAgent): void
    {
        $this->userAgent = $userAgent;
        $mozillaPos = strpos($userAgent, 'Mozilla/');
        if ($mozillaPos !== false) {
            $this->appVersion = substr($userAgent, $mozillaPos + strlen('Mozilla/'));
        }

        if (str_contains($userAgent, 'Macintosh')) {
            $this->platform = "MacIntel";
        } elseif (str_contains($userAgent, 'Win32')) {
            $this->platform = "Win32";
        } elseif (str_contains($userAgent, 'Win64')) {
            $this->platform = "Win64";
        }
        // Consider adding logic for other platforms if needed
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'appCodeName' => $this->appCodeName,
            'appName' => $this->appName,
            'appVersion' => $this->appVersion,
            'cookieEnabled' => $this->cookieEnabled,
            'onLine' => $this->onLine,
            'productSub' => $this->productSub,
            'platform' => $this->platform,
            'language' => $this->language,
            'plugins' => $this->plugins,
            'userAgent' => $this->userAgent,
            // Add other relevant properties from the Python class if missed
            // Example: browserLanguage, systemLanguage (check if they exist in your Python impl)
            // 'browserLanguage' => $this->browserLanguage ?? 'undefined', // Handle potentially missing props
            // 'systemLanguage' => $this->systemLanguage ?? 'undefined',
        ];
    }
} 