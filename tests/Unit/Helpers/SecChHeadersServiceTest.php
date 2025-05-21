<?php

use Weijiajia\SaloonphpAppleClient\Exception\SecChHeadersException;
use Weijiajia\SaloonphpAppleClient\Helpers\SecChHeadersService;

// 测试 extractChromeVersion 方法的提取能力
test('extracts Chrome version correctly from different UAs', function (string $ua, string $expectedVersion) {
    $service = new SecChHeadersService($ua);
    $reflectionClass = new ReflectionClass(SecChHeadersService::class);
    $method = $reflectionClass->getMethod('extractChromeVersion');
    $method->setAccessible(true);

    $extractedVersion = $method->invoke($service);
    $this->assertEquals($expectedVersion, $extractedVersion);
})->with([
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '133'],
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.5563.147 Safari/537.36', '111'],
    ['Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '120'],
    ['Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.6312.40 Mobile Safari/537.36', '123'],
]);

// 测试 getFakeBrandForChrome 方法
test('returns correct fake brand for different Chrome versions', function (int $version, string $expectedBrand) {
    $service = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');
    $reflectionClass = new ReflectionClass(SecChHeadersService::class);
    $method = $reflectionClass->getMethod('getFakeBrandForChrome');
    $method->setAccessible(true);

    $fakeBrandData = $method->invoke($service, $version);
    $fakeBrand = $fakeBrandData[0];
    $this->assertEquals($expectedBrand, $fakeBrand);
})->with([
    [134, '"Not:A-Brand"'],
    [133, '"Not(A:Brand"'],
    [132, '"Not(A:Brand"'],
    [131, '"Not(A:Brand"'],
    [130, '"Not_A Brand"'],
    [125, '"Not_A Brand"'],
    [121, '"Not_A Brand"'],
    [120, '"Not A;Brand"'],
    [100, '"Not A;Brand"'],
    [90, '"Not A;Brand"'],
    [89, '"Not A;Brand"'],
    [50, '"Not A;Brand"'],
]);

// 测试不同版本的Edge浏览器
test('creates correct sec-ch-ua for various Edge versions', function (string $ua, string $expectedSecChUa) {
    $secChHeadersService = new SecChHeadersService($ua);
    $this->assertEquals($expectedSecChUa, $secChHeadersService->generateSecChUa());
})->with([
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.2623.0',
        '"Not(A:Brand";v="99", "Chromium";v="133", "Microsoft Edge";v="133"'],
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0',
        '"Not A;Brand";v="99", "Chromium";v="120", "Microsoft Edge";v="120"'],
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0',
        '"Not_A Brand";v="24", "Chromium";v="125", "Microsoft Edge";v="125"'],
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.54',
        '"Not A;Brand";v="99", "Chromium";v="108", "Microsoft Edge";v="108"'],
]);

// 测试移动设备的操作系统和平台检测
test('detects mobile platforms correctly', function (string $ua, string $expectedPlatform, string $expectedMobile) {
    $secChHeadersService = new SecChHeadersService($ua);
    $this->assertEquals($expectedPlatform, $secChHeadersService->generateSecChUaPlatform());
    $this->assertEquals($expectedMobile, $secChHeadersService->generateSecChUaMobile());
})->with([
    ['Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.6312.40 Mobile Safari/537.36',
        '"Android"', '?1'],
    ['Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/113.0.5672.121 Mobile/15E148 Safari/604.1',
        '"iOS"', '?1'],
    ['Mozilla/5.0 (iPad; CPU OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/113.0.5672.121 Mobile/15E148 Safari/604.1',
        '"iOS"', '?1'],
    ['Mozilla/5.0 (Linux; Android 13; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36 EdgA/112.0.1722.46',
        '"Android"', '?1'],
]);

// 测试 generateAllHeaders 方法
test('generates all required sec-ch headers', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');

    $headers = $secChHeadersService->generateAllHeaders();

    $this->assertIsArray($headers);
    $this->assertArrayHasKey('sec-ch-ua', $headers);
    $this->assertArrayHasKey('sec-ch-ua-mobile', $headers);
    $this->assertArrayHasKey('sec-ch-ua-platform', $headers);
    $this->assertEquals('"Not(A:Brand";v="99", "Chromium";v="133", "Google Chrome";v="133"', $headers['sec-ch-ua']);
    $this->assertEquals('?0', $headers['sec-ch-ua-mobile']);
    $this->assertEquals('"Windows"', $headers['sec-ch-ua-platform']);
});

// 测试不同的 Opera 版本和 Chromium 版本组合
test('handles Opera browser with different Chrome versions', function (string $ua, string $expectedSecChUa) {
    $secChHeadersService = new SecChHeadersService($ua);
    $this->assertEquals($expectedSecChUa, $secChHeadersService->generateSecChUa());
})->with([
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 OPR/110.0.0.0',
        '"Opera";v="110", "Not;A Brand";v="99", "Chromium";v="124"'],
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 OPR/106.0.0.0',
        '"Opera";v="106", "Not;A Brand";v="99", "Chromium";v="120"'],
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 OPR/107.0.0.0',
        '"Opera";v="107", "Not;A Brand";v="99", "Chromium";v="121"'],
]);

// 测试边界情况
test('handles user agents with missing or incomplete version information', function () {
    // Chrome 浏览器但没有版本号
    $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/ Safari/537.36';
    $service = new SecChHeadersService($ua);
    $this->assertStringContainsString('"Google Chrome";v=""', $service->generateSecChUa());

    // Edge 浏览器但版本号格式不标准
    $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133 Safari/537.36 Edg/133';
    $service = new SecChHeadersService($ua);
    $this->assertStringContainsString('"Microsoft Edge";v="133"', $service->generateSecChUa());
});

// 测试不同操作系统的组合
test('handles various operating systems correctly', function (string $ua, string $expectedPlatform) {
    $secChHeadersService = new SecChHeadersService($ua);
    $this->assertEquals($expectedPlatform, $secChHeadersService->generateSecChUaPlatform());
})->with([
    ['Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
        '"Windows"'],
    ['Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
        '"Windows"'],
    ['Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
        '"macOS"'],
    ['Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
        '"Linux"'],
    ['Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36',
        '"Chrome OS"'],
]);

// 测试异常情况
test('throws exception for non-Chromium browsers', function (string $ua) {
    $this->expectException(SecChHeadersException::class);
    new SecChHeadersService($ua);
})->with([
    'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0',
    'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/605.1.15',
    'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
]);

// 测试现有的测试案例
test('creates Chrome 134+ sec-ch-ua header', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36');

    // 验证生成的头部
    $this->assertEquals('"Not:A-Brand";v="24", "Chromium";v="134", "Google Chrome";v="134"', $secChHeadersService->generateSecChUa());
    $this->assertEquals('?0', $secChHeadersService->generateSecChUaMobile());
    $this->assertEquals('"Windows"', $secChHeadersService->generateSecChUaPlatform());
});

test('creates Chrome 133 sec-ch-ua header', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');

    $this->assertEquals('"Not(A:Brand";v="99", "Chromium";v="133", "Google Chrome";v="133"', $secChHeadersService->generateSecChUa());
    $this->assertEquals('?0', $secChHeadersService->generateSecChUaMobile());
    $this->assertEquals('"Windows"', $secChHeadersService->generateSecChUaPlatform());
});

test('creates Chrome 125 sec-ch-ua header', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36');

    $this->assertEquals('"Not_A Brand";v="24", "Chromium";v="125", "Google Chrome";v="125"', $secChHeadersService->generateSecChUa());
});

test('creates Edge 133 sec-ch-ua header', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.2623.0');

    $this->assertEquals('"Not(A:Brand";v="99", "Chromium";v="133", "Microsoft Edge";v="133"', $secChHeadersService->generateSecChUa());
});

test('creates Opera 110 sec-ch-ua header', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 OPR/110.0.0.0');

    $this->assertEquals('"Opera";v="110", "Not;A Brand";v="99", "Chromium";v="124"', $secChHeadersService->generateSecChUa());
});

test('throws for non Chromium browser', function () {
    $this->expectException(SecChHeadersException::class);
    new SecChHeadersService('Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123.0');
});

test('throws for Safari browser', function () {
    $this->expectException(SecChHeadersException::class);
    new SecChHeadersService('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/605.1.15');
});

test('sets correct mobile and platform value for Android device', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36');

    $this->assertEquals('?1', $secChHeadersService->generateSecChUaMobile());
    $this->assertEquals('"Android"', $secChHeadersService->generateSecChUaPlatform());
});

test('sets correct platform value for macOS device', function () {
    $secChHeadersService = new SecChHeadersService('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36');

    $this->assertEquals('"macOS"', $secChHeadersService->generateSecChUaPlatform());
});
