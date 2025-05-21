<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Services;

use DateTime;
use IntlDateFormatter; // Assuming Browser class is in the root namespace
use Weijiajia\SaloonphpAppleClient\Browser\Browser; // 需要 intl 扩展

// 需要 intl 扩展

class DeviceID
{
    public int $winterTimezoneOffset;
    public int $summerTimezoneOffset;

    /** @var array<string, string> */
    public array $plugins = [];

    private Browser $browser;
    // private ?LoggerInterface $logger;

    public function __construct(Browser $browser /* , ?LoggerInterface $logger = null */)
    {
        $this->browser = $browser;
        // $this->logger = $logger;

        // Calculate timezone offsets for standard and daylight saving time
        // Note: PHP's DateTime handles DST automatically based on the date and timezone.
        // The concept of fixed winter/summer offsets might differ slightly in implementation
        // compared to Python's manual check if not using a timezone database.
        // We'll calculate based on specific dates as in the Python code.
        $this->winterTimezoneOffset = $this->getTimezoneOffset(new \DateTime('2005-01-15', new \DateTimeZone($this->browser->timezone)));
        $this->summerTimezoneOffset = $this->getTimezoneOffset(new \DateTime('2005-07-15', new \DateTimeZone($this->browser->timezone)));

        // Initialize plugins (can be done here or lazily)
        $this->getPluginVersions(); // Populate plugin versions on construction
    }

    /**
     * Generates the raw Device ID string (before encoding).
     *
     * @throws \Exception
     */
    public function validate(): string
    {
        // Use the browser's configured timezone
        $tz = new \DateTimeZone($this->browser->timezone);
        $dateTimeValue = new \DateTime('now', $tz);

        // Ensure plugin versions are loaded if not done in constructor
        // $this->getPluginVersions();

        $windowData = $this->browser->window->toArray(); // Get window data once
        $navigatorData = $windowData['navigator'] ?? [];
        $screenData = $windowData['screen'] ?? [];
        $documentData = $windowData['document'] ?? [];

        $attributesToRead = [
            'TF1',
            '015', // Version identifier?
            $this->scriptEngineMajorVersion(),
            $this->scriptEngineMinorVersion(),
            $this->scriptEngineBuildVersion(),
            $this->getCompVer('{7790769C-0471-11D2-AF11-00C04FA35D02}'),
            $this->getCompVer('{89820200-ECBD-11CF-8B85-00AA005B4340}'),
            $this->getCompVer('{283807B5-2C60-11D0-A31D-00AA00B92C03}'),
            $this->getCompVer('{4F216970-C90C-11D1-B5C7-0000F8051515}'),
            $this->getCompVer('{44BBA848-CC51-11CF-AAFA-00AA00B6015C}'),
            $this->getCompVer('{9381D8F2-0288-11D0-9501-00AA00B911A5}'),
            $this->getCompVer('{4F216970-C90C-11D1-B5C7-0000F8051515}'), // Duplicate?
            $this->getCompVer('{5A8D6EE0-3E18-11D0-821E-444553540000}'),
            $this->getCompVer('{89820200-ECBD-11CF-8B85-00AA005B4383}'),
            $this->getCompVer('{08B0E5C0-4FCB-11CF-AAA5-00401C608555}'),
            $this->getCompVer('{45EA75A0-A269-11D1-B5BF-0000F8051515}'),
            $this->getCompVer('{DE5AED00-A4BF-11D1-9948-00C04F98BBC9}'),
            $this->getCompVer('{22D6F312-B0F6-11D0-94AB-0080C74C7E95}'),
            $this->getCompVer('{44BBA842-CC51-11CF-AAFA-00AA00B6015B}'),
            $this->getCompVer('{3AF36230-A269-11D1-B5BF-0000F8051515}'),
            $this->getCompVer('{44BBA840-CC51-11CF-AAFA-00AA00B6015C}'),
            $this->getCompVer('{CC2A9BA0-3BDD-11D0-821E-444553540000}'),
            $this->getCompVer('{08B0E5C0-4FCB-11CF-AAA5-00401C608500}'),
            $navigatorData['appCodeName'] ?? 'Mozilla', // Default from Navigator class
            $navigatorData['appName'] ?? 'Netscape',     // Default from Navigator class
            $navigatorData['appVersion'] ?? '',
            $this->findVariable(['navigator.productSub', 'navigator.appMinorVersion'], $windowData),
            $navigatorData['browserLanguage'] ?? 'undefined', // Assuming these might exist based on Python comments
            $navigatorData['cookieEnabled'] ? 'true' : 'false',
            $this->findVariable(['navigator.oscpu', 'navigator.cpuClass'], $windowData),
            $navigatorData['onLine'] ? 'true' : 'false',
            $navigatorData['platform'] ?? '',
            $navigatorData['systemLanguage'] ?? 'undefined', // Assuming these might exist
            $navigatorData['userAgent'] ?? '',
            $this->findVariable(['navigator.language', 'navigator.userLanguage'], $windowData),
            $documentData['defaultCharset'] ?? 'undefined', // Need to check if Document class has this
            $documentData['domain'] ?? '',
            $screenData['deviceXDPI'] ?? 'undefined',       // Need to check if Screen class has this
            $screenData['deviceYDPI'] ?? 'undefined',       // Need to check if Screen class has this
            $screenData['fontSmoothingEnabled'] ?? 'undefined', // Need to check if Screen class has this
            $screenData['updateInterval'] ?? 'undefined',     // Need to check if Screen class has this
            $this->isDSTSupported() ? 'true' : 'false',
            $this->isDSTActive($dateTimeValue) ? 'true' : 'false',
            '@UTC@', // Placeholder for UTC timestamp
            (string) $this->getTimezoneOffsetInHours($dateTimeValue),
            $this->getLocalPastDate($tz), // Pass timezone
            (string) ($screenData['width'] ?? ''),
            (string) ($screenData['height'] ?? ''),
            $this->plugins['Acrobat'] ?? '',
            $this->plugins['Flash'] ?? '',
            $this->plugins['QuickTime'] ?? '',
            $this->plugins['Java Plug-in'] ?? '', // Key adjusted for consistency
            $this->plugins['Director'] ?? '',
            $this->plugins['Office'] ?? '',
            '', // Placeholder for "(new Date().getTime()) - str.getTime()"
            (string) $this->winterTimezoneOffset,
            (string) $this->summerTimezoneOffset,
            $dateTimeValue->format('n/j/Y, g:i:s A'), // PHP format codes for m/d/Y, I:M:S p
            (string) ($screenData['colorDepth'] ?? ''),
            (string) ($screenData['availWidth'] ?? ''),
            (string) ($screenData['availHeight'] ?? ''),
            (string) ($screenData['availLeft'] ?? '0'), // Default to 0 if not present
            (string) ($screenData['availTop'] ?? '0'),  // Default to 0 if not present
            $this->getPluginName('Acrobat'),
            $this->getPluginName('Adobe SVG'),
            $this->getPluginName('Authorware'),
            $this->getPluginName('Citrix ICA'),
            $this->getPluginName('Director'),
            $this->getPluginName('Flash'),
            $this->getPluginName('MapGuide'),
            $this->getPluginName('MetaStream'),
            $this->getPluginName('PDFViewer'),
            $this->getPluginName('QuickTime'),
            $this->getPluginName('RealOne'),
            $this->getPluginName('RealPlayer Enterprise'),
            $this->getPluginName('RealPlayer Plugin'),
            $this->getPluginName('Seagate Software Report'),
            $this->getPluginName('Silverlight'),
            $this->getPluginName('Windows Media'),
            $this->getPluginName('iPIX'),
            $this->getPluginName('nppdf.so'), // Linux PDF plugin?
            (string) $this->getFontHeight(),
        ];

        $quoted = array_map('rawurlencode', $attributesToRead);

        $rslt = implode(';', $quoted).';';

        // Replace timestamp placeholder with current UTC milliseconds
        $utcTimestamp = (string) floor(microtime(true) * 1000);

        return str_replace(rawurlencode('@UTC@'), $utcTimestamp, $rslt);
        // Log if needed
        // $this->logger?->warning(sprintf("Device ID Raw: %s", $rslt));
    }

    // --- Helper methods corresponding to Python class ---

    public function scriptEngineMajorVersion(): string
    {
        return '';
    } // Placeholder

    public function scriptEngineMinorVersion(): string
    {
        return '';
    } // Placeholder

    public function scriptEngineBuildVersion(): string
    {
        return '';
    } // Placeholder

    public function getCompVer(string $val): string
    {
        return '';
    } // Placeholder

    /**
     * Finds the first available variable value from a list of possible paths.
     *
     * @param string[] $possibles  Array of paths like ['navigator.productSub', 'navigator.appMinorVersion']
     * @param array    $windowData Pre-fetched window data array
     *
     * @return string Found value or empty string
     */
    public function findVariable(array $possibles, array $windowData): string
    {
        foreach ($possibles as $possible) {
            $items = explode('.', $possible);
            if (2 === count($items)) {
                $component = $items[0]; // e.g., 'navigator'
                $property = $items[1]; // e.g., 'productSub'
                // Access the data using array keys from the pre-fetched windowData
                if (isset($windowData[$component], $windowData[$component][$property])) {
                    $value = $windowData[$component][$property];
                    // Return the value if it's considered non-empty/valid
                    if (null !== $value && '' !== $value) {
                        return (string) $value;
                    }
                }
            }
        }

        return ''; // Return empty string if no value found
    }

    /**
     * Gets the name (or version string) of a browser plugin.
     *
     * @param string $name Plugin name fragment to search for
     *
     * @return string Found plugin name string or empty string
     */
    public function getPluginVersion(string $name): string
    {
        // Access plugins from the Navigator object within the Browser
        $plugins = $this->browser->navigator->plugins ?? [];
        foreach ($plugins as $plugin) {
            if (isset($plugin['name']) && str_contains($plugin['name'], $name)) {
                return $plugin['name']; // Return the full name
            }
        }

        return '';
    }

    /**
     * Populates the internal plugins array by checking common plugin names.
     */
    public function getPluginVersions(): void
    {
        $pluginNames = ['Acrobat', 'Flash', 'QuickTime', 'Java Plug-in', 'Director', 'Office'];
        $this->plugins = []; // Reset before populating
        foreach ($pluginNames as $pluginName) {
            $this->plugins[$pluginName] = $this->getPluginVersion($pluginName);
        }
    }

    /**
     * Calculates the difference in timezone offset between summer and winter.
     *
     * @return int Offset difference in minutes
     */
    public function getDSTOffset(): int
    {
        return abs($this->winterTimezoneOffset - $this->summerTimezoneOffset);
    }

    /**
     * Checks if Daylight Saving Time is likely supported based on offset differences.
     */
    public function isDSTSupported(): bool
    {
        return 0 !== $this->getDSTOffset();
    }

    /**
     * Checks if Daylight Saving Time is active for a given date.
     */
    public function isDSTActive(\DateTime $time): bool
    {
        // Determine the offset for the minimum of the two fixed dates (more reliable DST check)
        $minOffset = min($this->winterTimezoneOffset, $this->summerTimezoneOffset);

        // Check if DST is supported and the current time's offset matches the minimum offset
        return $this->isDSTSupported() && $this->getTimezoneOffset($time) === $minOffset;
    }

    /**
     * Gets the timezone offset in hours relative to GMT, adjusting for DST.
     *
     * @return int Offset in hours
     */
    public function getTimezoneOffsetInHours(\DateTime $time): int
    {
        $dstAdjustment = 0;
        if ($this->isDSTActive($time)) {
            $dstAdjustment = $this->getDSTOffset();
        }
        // The offset from PHP's getTimezoneOffset is already in minutes from UTC.
        // We need to invert the sign and divide by 60.
        // The Python code adds the DST offset before dividing, let's replicate that.
        $totalOffsetMinutes = $this->getTimezoneOffset($time) + $dstAdjustment;

        return (int) (-$totalOffsetMinutes / 60);
    }

    /**
     * Returns a fixed past date formatted string.
     * Note: The original Python code used a hardcoded local time.
     * For consistency, we format a specific UTC time into the target timezone.
     *
     * @param \DateTimeZone $tz The target timezone
     */
    public function getLocalPastDate(\DateTimeZone $tz): string
    {
        // Define the date/time in UTC corresponding to the original example if possible,
        // or just use the exact date/time values given.
        // Using the literal values: 2005-06-07 21:33:44
        $pastDate = new \DateTime('2005-06-07 21:33:44', $tz); // Assume the time was local to the target timezone

        // Original Python format: '%-m/%-d/%Y, %-I:%-M:%-S %p'
        // PHP equivalent: 'n/j/Y, g:i:s A'
        return $pastDate->format('n/j/Y, g:i:s A');
    }

    public function getLocalPastDateLocaleAware(\DateTimeZone $tz, string $dateTime = 'now', string $locale = 'en_US'): string
    {
        $pastDate = new \DateTime($dateTime, $tz);

        // IntlDateFormatter::SHORT, IntlDateFormatter::MEDIUM, etc.
        // 这些常量大致对应 toLocaleString, toLocaleDateString, toLocaleTimeString 的不同形式
        // 但具体格式仍然取决于 locale 和 ICU 库版本
        $dateType = \IntlDateFormatter::SHORT;
        $timeType = \IntlDateFormatter::MEDIUM; // 或者 IntlDateFormatter::LONG, ::SHORT

        // 创建格式化器
        $formatter = new \IntlDateFormatter(
            $locale,
            $dateType,
            $timeType,
            $tz->getName(), // 使用时区名称
            \IntlDateFormatter::GREGORIAN // 或者 IntlDateFormatter::TRADITIONAL
        );

        if (!$formatter) {
            throw new \IntlException("Invalid date format: {$dateTime}");
        }

        return $formatter->format($pastDate);
    }

    /**
     * Gets the name and description of a plugin if found.
     *
     * @param string $name Plugin name fragment to search for
     *
     * @return string "Name|Description" or just "Name" or empty string
     */
    public function getPluginName(string $name): string
    {
        $plugins = $this->browser->navigator->plugins ?? [];
        foreach ($plugins as $plugin) {
            if (isset($plugin['name']) && str_contains($plugin['name'], $name)) {
                $ret = $plugin['name'];
                $desc = $plugin['description'] ?? ''; // Assuming description might exist
                if ($desc) {
                    $ret .= '|'.$desc;
                }

                return $ret;
            }
        }

        return '';
    }

    /**
     * Returns a fixed font height value.
     */
    public function getFontHeight(): int
    {
        return 25;
    }

    /**
     * Gets the raw timezone offset in minutes from UTC for a given DateTime object.
     * PHP's offset is positive west of UTC, negative east of UTC.
     * Python's offset convention seems opposite, hence the multiplication by -1 often.
     *
     * @return int Offset in minutes
     */
    public function getTimezoneOffset(\DateTime $date): int
    {
        // Get offset for the date's timezone from UTC
        return -$date->getOffset() / 60; // Convert seconds to minutes and invert sign to match Python logic
    }
}
