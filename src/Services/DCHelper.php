<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Services;

use DateTime;
use DateTimeZone;
use Exception;
use Weijiajia\SaloonphpAppleClient\Browser\Browser;


class DCHelper
{
    private Browser $browser;
    private DeviceID $deviceID;

    /** @var array<int, array{0: int, 1: int}> */
    private array $charMap;
    /** @var string[] */
    private array $specialChars;
    private string $encodingChars;

    // Properties for transform state
    private string $transformR = '';
    private int $transformN = 0;
    private int $transformA = 0;

    public function __construct(Browser $browser /*, ?LoggerInterface $logger = null*/) // Inject DeviceID or create it
    {
        $this->browser = $browser;
        $this->deviceID = new DeviceID($browser); // Create DeviceID instance
        // $this->logger = $logger;

        // Initialize mappings and character sets
        $this->encodingChars = ".0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz";
        $this->charMap = [
            1 => [4, 15], 110 => [8, 239], 74 => [8, 238], 57 => [7, 118], 56 => [7, 117],
            71 => [8, 233], 25 => [8, 232], 101 => [5, 28], 104 => [7, 111], 4 => [7, 110],
            105 => [6, 54], 5 => [7, 107], 109 => [7, 106], 103 => [9, 423], 82 => [9, 422],
            26 => [8, 210], 6 => [7, 104], 46 => [6, 51], 97 => [6, 50], 111 => [6, 49],
            7 => [7, 97], 45 => [7, 96], 59 => [5, 23], 15 => [7, 91], 11 => [8, 181],
            72 => [8, 180], 27 => [8, 179], 28 => [8, 178], 16 => [7, 88], 88 => [10, 703],
            113 => [11, 1405], 89 => [12, 2809], 107 => [13, 5617], 90 => [14, 11233],
            42 => [15, 22465], 64 => [16, 44929], 0 => [16, 44928], 81 => [9, 350],
            29 => [8, 174], 118 => [8, 173], 30 => [8, 172], 98 => [8, 171], 12 => [8, 170],
            99 => [7, 84], 117 => [6, 41], 112 => [6, 40], 102 => [9, 319], 68 => [9, 318],
            31 => [8, 158], 100 => [7, 78], 84 => [6, 38], 55 => [6, 37], 17 => [7, 73],
            8 => [7, 72], 9 => [7, 71], 77 => [7, 70], 18 => [7, 69], 65 => [7, 68],
            48 => [6, 33], 116 => [6, 32], 10 => [7, 63], 121 => [8, 125], 78 => [8, 124],
            80 => [7, 61], 69 => [7, 60], 119 => [7, 59], 13 => [8, 117], 79 => [8, 116],
            19 => [7, 57], 67 => [7, 56], 114 => [6, 27], 83 => [6, 26], 115 => [6, 25],
            14 => [6, 24], 122 => [8, 95], 95 => [8, 94], 76 => [7, 46], 24 => [7, 45],
            37 => [7, 44], 50 => [5, 10], 51 => [5, 9], 108 => [6, 17], 22 => [7, 33],
            120 => [8, 65], 66 => [8, 64], 21 => [7, 31], 106 => [7, 30], 47 => [6, 14],
            53 => [5, 6], 49 => [5, 5], 86 => [8, 39], 85 => [8, 38], 23 => [7, 18],
            75 => [7, 17], 20 => [7, 16], 2 => [5, 3], 73 => [8, 23], 43 => [9, 45],
            87 => [9, 44], 70 => [7, 10], 3 => [6, 4], 52 => [5, 1], 54 => [5, 0],
        ];
        $this->specialChars = [
            "%20", ";;;", "%3B", "%2C", "und", "fin", "ed;", "%28", "%29", "%3A", "/53",
            "ike", "Web", "0;", ".0", "e;", "on", "il", "ck", "01", "in", "Mo", "fa",
            "00", "32", "la", ".1", "ri", "it", "%u", "le",
        ];
    }

    /**
     * Generates the final data structure to be JSON encoded.
     *
     * @return string JSON encoded string
     * @throws Exception
     */
    public function getData(): string
    {
        $data = [
            "U" => $this->browser->navigator->userAgent ?? '',
            "L" => $this->browser->navigator->language ?? 'en-US',
            "Z" => $this->getGMTTimezone(),
            "V" => "1.1",
            "F" => $this->validate()
        ];

        $dataStr = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if ($dataStr === false) {
            // $this->logger?->error("JSON encoding failed for FD client data");
            throw new Exception("JSON encoding failed for FD client data");
        }

        // $this->logger?->info(sprintf("FD client data: %s", $dataStr));
        return $dataStr;
    }

    /**
     * Generates the encoded device fingerprint string (value F in getData).
     *
     * @return string Encoded fingerprint
     * @throws Exception
     */
    public function validate(): string
    {
        $tz = new DateTimeZone($this->browser->timezone);
        $dateTimeValue = new DateTime('now', $tz);

        // $this->deviceID->getPluginVersions(); // Ensure plugins are loaded (likely done in constructor)
        $windowData = $this->browser->window->toArray();

        $attributesToRead = [
            "TF1",
            "020", // Different version from DeviceID?
            $this->deviceID->scriptEngineMajorVersion(),
            $this->deviceID->scriptEngineMinorVersion(),
            $this->deviceID->scriptEngineBuildVersion(),
            $this->deviceID->getCompVer('{7790769C-0471-11D2-AF11-00C04FA35D02}'),
            $this->deviceID->getCompVer('{89820200-ECBD-11CF-8B85-00AA005B4340}'),
            $this->deviceID->getCompVer('{283807B5-2C60-11D0-A31D-00AA00B92C03}'),
            $this->deviceID->getCompVer('{4F216970-C90C-11D1-B5C7-0000F8051515}'),
            $this->deviceID->getCompVer('{44BBA848-CC51-11CF-AAFA-00AA00B6015C}'),
            $this->deviceID->getCompVer('{9381D8F2-0288-11D0-9501-00AA00B911A5}'),
            $this->deviceID->getCompVer('{4F216970-C90C-11D1-B5C7-0000F8051515}'),
            $this->deviceID->getCompVer('{5A8D6EE0-3E18-11D0-821E-444553540000}'),
            $this->deviceID->getCompVer('{89820200-ECBD-11CF-8B85-00AA005B4383}'),
            $this->deviceID->getCompVer('{08B0E5C0-4FCB-11CF-AAA5-00401C608555}'),
            $this->deviceID->getCompVer('{45EA75A0-A269-11D1-B5BF-0000F8051515}'),
            $this->deviceID->getCompVer('{DE5AED00-A4BF-11D1-9948-00C04F98BBC9}'),
            $this->deviceID->getCompVer('{22D6F312-B0F6-11D0-94AB-0080C74C7E95}'),
            $this->deviceID->getCompVer('{44BBA842-CC51-11CF-AAFA-00AA00B6015B}'),
            $this->deviceID->getCompVer('{3AF36230-A269-11D1-B5BF-0000F8051515}'),
            $this->deviceID->getCompVer('{44BBA840-CC51-11CF-AAFA-00AA00B6015C}'),
            $this->deviceID->getCompVer('{CC2A9BA0-3BDD-11D0-821E-444553540000}'),
            $this->deviceID->getCompVer('{08B0E5C0-4FCB-11CF-AAA5-00401C608500}'),
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            $this->findVariable(['navigator.productSub', 'navigator.appMinorVersion'], $windowData),
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            $this->findVariable(['navigator.oscpu', 'navigator.cpuClass'], $windowData),
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            $this->findVariable(['navigator.language', 'navigator.userLanguage'], $windowData),
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            $this->deviceID->isDSTSupported() ? 'true' : 'false',
            $this->deviceID->isDSTActive($dateTimeValue) ? 'true' : 'false',
            "@UTC@",
            (string)$this->deviceID->getTimezoneOffsetInHours($dateTimeValue),
            $this->deviceID->getLocalPastDate($tz),
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            $this->deviceID->plugins['Acrobat'] ?? '',
            $this->deviceID->plugins['Flash'] ?? '',
            $this->deviceID->plugins['QuickTime'] ?? '',
            $this->deviceID->plugins['Java Plug-in'] ?? '',
            $this->deviceID->plugins['Director'] ?? '',
            $this->deviceID->plugins['Office'] ?? '',
            "@CT@", // Placeholder for calculation time
            (string)$this->deviceID->winterTimezoneOffset,
            (string)$this->deviceID->summerTimezoneOffset,
            // $dateTimeValue->format('d/m/Y, H:i:s'),
            $dateTimeValue->format('n/j/Y, g:i:s A'),
            // $this->deviceID->getLocalPastDateLocaleAware($tz,'now'),
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            "", // Empty in DCHelper
            $this->deviceID->getPluginName('Acrobat'),
            $this->deviceID->getPluginName('Adobe SVG'),
            $this->deviceID->getPluginName('Authorware'),
            $this->deviceID->getPluginName('Citrix ICA'),
            $this->deviceID->getPluginName('Director'),
            $this->deviceID->getPluginName('Flash'),
            $this->deviceID->getPluginName('MapGuide'),
            $this->deviceID->getPluginName('MetaStream'),
            $this->deviceID->getPluginName('PDFViewer'),
            $this->deviceID->getPluginName('QuickTime'),
            $this->deviceID->getPluginName('RealOne'),
            $this->deviceID->getPluginName('RealPlayer Enterprise'),
            $this->deviceID->getPluginName('RealPlayer Plugin'),
            $this->deviceID->getPluginName('Seagate Software Report'),
            $this->deviceID->getPluginName('Silverlight'),
            $this->deviceID->getPluginName('Windows Media'),
            $this->deviceID->getPluginName('iPIX'),
            $this->deviceID->getPluginName('nppdf.so'),
            (string)$this->deviceID->getFontHeight(),
            "", "", "", "", "", "", "", "", "", "", "", "", "", "", // 14 Empty strings
            "5.6.1-0", // Hardcoded version?
            "", // Empty trailer
        ];


        $quoted = array_map('rawurlencode', $attributesToRead);
        $rslt = implode(";", $quoted) . ";";

        $utcTimestampMs = intval(floor(microtime(true) * 1000));
        $ctValue = $utcTimestampMs - intval(floor($dateTimeValue->getTimestamp() * 1000));


        $rslt = str_replace(rawurlencode("@UTC@"), (string) $utcTimestampMs, $rslt);
        $rslt = str_replace(rawurlencode("@CT@"), (string) $ctValue, $rslt);

        $encoded = $this->encode($rslt);

        return $encoded;
    }

    /**
     * Internal processing function for the transform method.
     *
     * @param array{0: int, 1: int} $pair
     */
    private function processTransformPair(array $pair): void
    {
        $this->transformN = ($this->transformN << $pair[0]) | $pair[1];
        $this->transformA += $pair[0];
        while ($this->transformA >= 6) {
            $index = ($this->transformN >> ($this->transformA - 6)) & 63;
            if (isset($this->encodingChars[$index])) {
                $this->transformR .= $this->encodingChars[$index];
            } else {
                // Handle error: index out of bounds for encodingChars
                // This might indicate an issue with the logic or charMap
                // $this->logger?->error(sprintf("Encoding index %d out of bounds", $index));
                // Potentially throw an exception or append a placeholder
                $this->transformR .= '_'; // Placeholder for error
            }
            $this->transformN ^= ($index << ($this->transformA - 6));
            $this->transformA -= 6;
        }
    }

    /**
     * Transforms the input string using bitwise operations and charMap.
     *
     * @param string $inputStr
     * @return string|null Transformed string or null on error
     */
    private function transform(string $inputStr): ?string
    {
        // Reset state variables for each transformation
        $this->transformR = '';
        $this->transformN = 0;
        $this->transformA = 0;

        $len = strlen($inputStr);
        $this->processTransformPair([6, (7 & $len) << 3]);
        $this->processTransformPair([6, (56 & $len) >> 3 | 1]); // Adjusted shift and OR based on Python logic

        for ($i = 0; $i < $len; $i++) {
            $charCode = ord($inputStr[$i]);
            if (!isset($this->charMap[$charCode])) {
                 // $this->logger?->error(sprintf("Character code %d not found in charMap", $charCode));
                return null; // Character not in map, cannot transform
            }
            $this->processTransformPair($this->charMap[$charCode]);
        }

        // Process the final padding character (index 0)
        if (isset($this->charMap[0])) {
             $this->processTransformPair($this->charMap[0]);
        }

        // Handle remaining bits
        if ($this->transformA > 0) {
            $this->processTransformPair([6 - $this->transformA, 0]);
        }

        return $this->transformR;
    }

    /**
     * Encodes the semi-colon separated, URL-encoded string.
     *
     * @param string $clientId Raw string from validate()
     * @return string Encoded string
     */
    public function encode(string $clientId): string
    {
        // 1. Replace special characters with control characters
        $transformedStr = $clientId;
        foreach ($this->specialChars as $i => $char) {
            // Use chr(i + 1) as in Python
            $transformedStr = str_replace($char, chr($i + 1), $transformedStr);
        }

        // 2. Transform the string using bitwise logic
        $baseEncoded = $this->transform($transformedStr);
        if ($baseEncoded === null) {
            // If transform fails, return the original (or partially transformed)
            // Python returns original clientId here, let's stick to that.
            // $this->logger?->warning("Transform failed, returning original Client ID");
            return $clientId;
        }

        // 3. Calculate checksum
        $checksum = 0xFFFF; // 65535
        $clientIdLen = strlen($clientId);
        for ($i = 0; $i < $clientIdLen; $i++) {
            $charCode = ord($clientId[$i]);
            // Simulate 16-bit operations using & 0xFFFF
            $checksum = (($checksum >> 8) | ($checksum << 8)) & 0xFFFF;
            $checksum ^= ($charCode & 0xFF);
            $checksum ^= (($checksum & 0xFF) >> 4);
            $checksum ^= ($checksum << 12) & 0xFFFF;
            $checksum ^= (($checksum & 0xFF) << 5) & 0xFFFF;
        }
        $checksum &= 0xFFFF;

        // 4. Append checksum characters
        $result = $baseEncoded;
        $result .= $this->encodingChars[$checksum >> 12] ?? '_'; // Check bounds
        $result .= $this->encodingChars[($checksum >> 6) & 63] ?? '_'; // Check bounds
        $result .= $this->encodingChars[$checksum & 63] ?? '_'; // Check bounds

        return $result;
    }

    /**
     * Formats the timezone offset string like "GMT+HH:MM" or "GMT-HH:MM".
     *
     * @return string
     */
    public function getGMTTimezone(): string
    {
        // Use the offset calculation from DeviceID
        $now = new DateTime("now", new DateTimeZone($this->browser->timezone));
        $offsetMinutesTotal = $this->deviceID->getTimezoneOffset($now);

        // Python's getTimezoneOffset is negative for positive offsets (e.g., -480 for GMT+8)
        // PHP's getOffset gives seconds (negative west, positive east)
        // We need to match the GMT+/-HH:MM format based on the raw offset from UTC.

        $offsetSeconds = -$offsetMinutesTotal * 60; // Convert back to seconds, invert sign

        $sign = ($offsetSeconds < 0) ? '-' : '+';
        $offsetHours = floor(abs($offsetSeconds) / 3600);
        $offsetMinutes = floor((abs($offsetSeconds) % 3600) / 60);

        return sprintf("GMT%s%02d:%02d", $sign, $offsetHours, $offsetMinutes);
    }

    /**
     * Helper function to find variables, simplified in DCHelper to return empty string.
     * (Kept for structural similarity, but DeviceID->findVariable is the one used)
     *
     * @param string[] $possibles
     * @param array $windowData
     * @return string Always empty string
     */
    public function findVariable(array $possibles, array $windowData): string
    {
        // DCHelper version always returns empty string according to the Python code provided.
        return "";
    }
} 