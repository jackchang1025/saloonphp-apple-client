<?php

namespace Weijiajia\SaloonphpAppleClient\Helpers;

use DeviceDetector\DeviceDetector;
use Weijiajia\SaloonphpAppleClient\Exception\SecChHeadersException;

class SecChHeadersService
{
    /**
     * 支持的浏览器列表
     */
    private const  SUPPORTED_BROWSERS = [
        'Chrome', 'Edge', 'Opera', 'Chromium', 'Microsoft Edge', 'Chrome Mobile', 'CriOS'
    ];

    private const FAKE_BRAND_VERSIONS = [
        'chrome_134_plus' => ['"Not:A-Brand"', '24'],
        'chrome_131_133' => ['"Not(A:Brand"', '99'],
        'chrome_121_130' => ['"Not_A Brand"', '24'],
        'chrome_90_120' => ['"Not A;Brand"', '99'],
        'chrome_default' => ['"Not A;Brand"', '99'],
    ];

    private const  PLATFORM_MAPPING = [
        'Windows' => '"Windows"',
        'Mac' => '"macOS"',
        'iOS' => '"iOS"',
        'Android' => '"Android"',
        'Linux' => '"Linux"',
        'Chrome OS' => '"Chrome OS"',
    ];

    protected DeviceDetector $deviceDetector;

    /**
     * @param string $userAgent 用户代理字符串
     * @throws SecChHeadersException 当不是浏览器或不是支持的 Chromium 浏览器时抛出
     */
    public function __construct(protected string $userAgent)
    {
        $this->deviceDetector = new DeviceDetector($userAgent);
        $this->deviceDetector->parse();

        $this->validateBrowser();
    }

    /**
     * 校验是否为支持的浏览器
     * @throws SecChHeadersException
     */
    private function validateBrowser(): void
    {
        // 获取浏览器名称
        $browserName = $this->deviceDetector->getClient('name');

        // 移动设备上的Chrome浏览器支持
        $isMobileChrome = preg_match('/Chrome.*Mobile.*Android/i', $this->userAgent) === 1;
        
        // iOS设备上的Chrome浏览器支持（CriOS）
        $isIOSChrome = false !== stripos($this->userAgent, "CriOS");

        if (!$isMobileChrome && !$isIOSChrome && !in_array($browserName, self::SUPPORTED_BROWSERS, true)) {
            throw new SecChHeadersException('Not a Chromium browser');
        }
    }

    /**
     * 获取 DeviceDetector 实例
     */
    public function getDeviceDetector(): DeviceDetector
    {
        return $this->deviceDetector;
    }

    /**
     * 生成 sec-ch-ua-mobile 头部
     */
    public function generateSecChUaMobile(): string
    {
        // 直接检测 iOS 移动设备
        if (str_contains($this->userAgent, 'iPhone') ||
            str_contains($this->userAgent, 'iPad') ||
            str_contains($this->userAgent, 'iPod')) {
            return '?1';
        }
        
        // 使用 DeviceDetector 检测各种移动设备类型
        return $this->deviceDetector->isSmartphone() || 
               $this->deviceDetector->isFeaturePhone() || 
               $this->deviceDetector->isTablet() ? '?1' : '?0';
    }

    /**
     * 从 User-Agent 中提取 Chrome 版本号
     */
    private function extractChromeVersion(): string
    {
        $userAgent = $this->userAgent;
        $chromeMatch = [];
        
        // 匹配 Chrome/XX.X.X.X 格式的版本号
        if (preg_match('/Chrome\/([0-9.]+)/', $userAgent, $chromeMatch)) {
            $chromeVersion = $chromeMatch[1];
            return explode('.', $chromeVersion)[0] ?? '';
        }
        
        // 匹配 iOS 上的 Chrome（CriOS）版本号
        if (preg_match('/CriOS\/([0-9.]+)/', $userAgent, $chromeMatch)) {
            $chromeVersion = $chromeMatch[1];
            return explode('.', $chromeVersion)[0] ?? '';
        }
        
        // 如果找不到，使用设备检测器的结果
        $client = $this->deviceDetector->getClient();
        $browserVersion = $client['version'] ?? '';
        return explode('.', $browserVersion)[0] ?? '';
    }

    /**
     * 生成 sec-ch-ua 头部
     */
    public function generateSecChUa(): string
    {
        $client = $this->deviceDetector->getClient();
        $browserName = $client['name'] ?? '';
        $browserVersion = $client['version'] ?? '';
        $majorVersion = explode('.', $browserVersion)[0] ?? '';
        
        // 处理Android上的Chrome浏览器
        $isMobileChrome = preg_match('/Chrome.*Mobile.*Android/i', $this->userAgent) === 1;
        if ($isMobileChrome) {
            return $this->generateChromeSecChUa($this->extractChromeVersion());
        }
        
        // 处理iOS上的Chrome浏览器
        $isIOSChrome = false !== stripos($this->userAgent, "CriOS");
        if ($isIOSChrome) {
            return $this->generateChromeSecChUa($this->extractChromeVersion());
        }
        
        return match(true) {
            stripos($browserName, 'Chrome') !== false && stripos($browserName, 'Edge') === false
                => $this->generateChromeSecChUa($majorVersion),
            stripos($browserName, 'Edge') !== false || stripos($browserName, 'Microsoft Edge') !== false
                => $this->generateEdgeSecChUa($majorVersion),
            stripos($browserName, 'Opera') !== false
                => $this->generateOperaSecChUa($majorVersion, $this->extractChromeVersion()),
            stripos($browserName, 'Chromium') !== false
                => $this->generateGenericChromiumSecChUa($majorVersion),
            default
                => '"Not:A-Brand";v="24", "Chromium";v="133", "Google Chrome";v="133"'
        };
    }
    
    /**
     * 生成 Chrome 浏览器的 sec-ch-ua 头部
     */
    public function generateChromeSecChUa(string $majorVersion): string
    {
        [$fakeBrand, $fakeVersion] = $this->getFakeBrandForChrome((int)$majorVersion);
        
        return sprintf('%s;v="%s", "Chromium";v="%s", "Google Chrome";v="%s"', 
            $fakeBrand, 
            $fakeVersion, 
            $majorVersion, 
            $majorVersion
        );
    }
    
    /**
     * 获取特定 Chrome 版本的 fake brand 信息
     */
    private function getFakeBrandForChrome(int $majorVersion): array
    {
        if ($majorVersion >= 134) {
            return self::FAKE_BRAND_VERSIONS['chrome_134_plus'];
        }

        if ($majorVersion >= 131 && $majorVersion <= 133) {
            return self::FAKE_BRAND_VERSIONS['chrome_131_133'];
        }

        if ($majorVersion >= 121 && $majorVersion <= 130) {
            return self::FAKE_BRAND_VERSIONS['chrome_121_130'];
        }

        if ($majorVersion >= 90 && $majorVersion <= 120) {
            return self::FAKE_BRAND_VERSIONS['chrome_90_120'];
        }

        return self::FAKE_BRAND_VERSIONS['chrome_default'];
    }
    
    /**
     * 生成 Edge 浏览器的 sec-ch-ua 头部
     */
    public function generateEdgeSecChUa(string $majorVersion): string
    {
        $majorVersionInt = (int)$majorVersion;
        
        if ($majorVersionInt < 109) {
            return sprintf('"Not A;Brand";v="99", "Chromium";v="%s", "Microsoft Edge";v="%s"', 
                $majorVersion, 
                $majorVersion
            );
        }
        
        $fakeBrand = match(true) {
            $majorVersionInt >= 131 => '"Not(A:Brand"',
            $majorVersionInt >= 121 => '"Not_A Brand"',
            default => '"Not A;Brand"'
        };
        
        $fakeVersion = $majorVersionInt >= 121 && $majorVersionInt <= 130 ? '24' : '99';
        
        return sprintf('%s;v="%s", "Chromium";v="%s", "Microsoft Edge";v="%s"', 
            $fakeBrand, 
            $fakeVersion, 
            $majorVersion, 
            $majorVersion
        );
    }
    
    /**
     * 生成 Opera 浏览器的 sec-ch-ua 头部
     * 
     * @param string $operaVersion Opera版本号
     * @param string $chromeVersion Chrome版本号
     */
    public function generateOperaSecChUa(string $operaVersion, string $chromeVersion): string
    {
        // Opera浏览器使用Chromium的版本号，而不是自己的版本号
        return sprintf('"Opera";v="%s", "Not;A Brand";v="99", "Chromium";v="%s"', 
            $operaVersion, 
            $chromeVersion
        );
    }

    /**
     * 生成 Microsoft Edge 浏览器的 sec-ch-ua 头部
     */
    public function generateMicrosoftEdgeSecChUa(string $majorVersion): string
    {
        return $this->generateEdgeSecChUa($majorVersion);
    }
    
    /**
     * 生成通用 Chromium 浏览器的 sec-ch-ua 头部
     */
    public function generateGenericChromiumSecChUa(string $majorVersion): string
    {
        return sprintf('"Not A;Brand";v="99", "Chromium";v="%s"', $majorVersion);
    }
    
    /**
     * 生成 sec-ch-ua-platform 头部
     */
    public function generateSecChUaPlatform(): string
    {
        // 对 iOS 设备进行特殊检测
        if (str_contains($this->userAgent, 'iPhone') ||
            str_contains($this->userAgent, 'iPad') ||
            str_contains($this->userAgent, 'iPod') ||
            str_contains($this->userAgent, 'CriOS')) {
            return self::PLATFORM_MAPPING['iOS'];
        }
        
        $os = $this->deviceDetector->getOs();
        if (empty($os)) {
            return self::PLATFORM_MAPPING['Windows'];
        }
        
        $osName = $os['name'] ?? '';
        
        foreach (self::PLATFORM_MAPPING as $key => $value) {
            if (stripos($osName, $key) !== false) {
                return $value;
            }
        }
        
        return self::PLATFORM_MAPPING['Windows'];
    }
    
    /**
     * 生成所有 Sec-Ch 头部
     */
    public function generateAllHeaders(): array
    {
        return [
            'sec-ch-ua' => $this->generateSecChUa(),
            'sec-ch-ua-mobile' => $this->generateSecChUaMobile(),
            'sec-ch-ua-platform' => $this->generateSecChUaPlatform(),
        ];
    }
} 