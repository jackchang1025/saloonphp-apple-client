# Saloonphp Apple Client

基于 [Saloon](https://github.com/saloonphp/saloon) 构建的苹果 API PHP 客户端。

## 功能特性

- 完整的苹果 API 集成，支持多种服务：
  - Apple ID 管理
  - iCloud 服务
  - 账户管理
  - 认证服务
  - 购买 API
  - 问题报告服务
- 内置苹果特定错误处理
- 认证会话的 Cookie 管理
- HTTP 代理支持
- 头信息同步
- 日志记录功能
- XML 和 Plist 响应解析

## 系统要求

- PHP 8.0 或更高版本
- Saloon v3.0+

## 安装

```bash
composer require weijiajia/saloonphp-apple-client
```

## 使用方法

### 基本用法

```php
// 导入必要的类
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpLogsPlugin\Driver\FileLogDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// 创建连接器实例
$connector = new AppleIdConnector();

// 启用调试
$connector->debug();

// 配置日志
$logger = new FileLogDriver('/path/to/logs');
$connector->withLogger($logger);

// 配置头信息同步
$connector->withHeaderSynchronizeDriver(new ArrayStoreHeaderSynchronize());

// 配置代理（如需）
$connector->setProxy('http://proxy.example.com:8080');

// 发送请求
$response = $connector->send(new SomeAppleRequest());

// 处理响应
$data = $response->dto();
```

## 可用集成

### Apple ID (AppleId)

AppleId 集成提供了对 Apple ID 管理功能的访问。

```php
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\LoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\SecurityCodeRequest;

// 创建连接器
$appleIdConnector = new AppleIdConnector();

// 使用 Apple ID 登录
$loginResponse = $appleIdConnector->send(new LoginRequest([
    'apple_id' => 'user@example.com',
    'password' => 'your_password'
]));

// 处理双因素认证（如需）
if ($loginResponse->requiresSecurityCode()) {
    $securityResponse = $appleIdConnector->send(new SecurityCodeRequest([
        'code' => '123456'
    ]));
}

// 访问不同的资源
$accountResource = $appleIdConnector->getAccountResource();
$bootstrapResource = $appleIdConnector->getBootstrapResources();
$securityDevicesResource = $appleIdConnector->getSecurityDevicesResources();
$securityPhoneResource = $appleIdConnector->getSecurityPhoneResources();
$paymentResource = $appleIdConnector->getPaymentResources();
```

### iCloud 服务 (Icloud)

访问 iCloud 服务，包括家庭共享管理。

```php
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\SetupIcloudConnector;

// 创建连接器
$icloudConnector = new SetupIcloudConnector();

// 访问家庭资源
$familyResources = $icloudConnector->getFamilyResources();

// 获取家庭成员
$familyMembers = $familyResources->getMembers();

// 访问认证资源
$authenticateResources = $icloudConnector->getAuthenticateResources();

// 设置资源
$setupResources = $icloudConnector->setupWResources();
```

### 购买 API (Buy)

与苹果购买系统交互。

```php
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\BuyConnector;

// 创建连接器
$buyConnector = new BuyConnector();

// 获取资源
$resources = $buyConnector->getResources();

// 购买应用
$purchaseResponse = $resources->purchase([
    'productId' => 'com.example.app', 
    'price' => '0.99',
    'currency' => 'USD'
]);

// 获取购买历史
$history = $resources->getPurchaseHistory();
```

### 问题报告 (ReportProblem)

用于报告已购买内容的问题。

```php
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\ReportProblemConnector;

// 创建连接器
$reportConnector = new ReportProblemConnector();

// 获取资源
$resources = $reportConnector->getResources();

// 报告购买问题
$reportResponse = $resources->reportProblem([
    'purchaseId' => '1234567890',
    'issueType' => 'DOES_NOT_WORK',
    'comments' => '应用程序启动时崩溃'
]);
```

### 注册 icloud.com 的 Apple ID

完整的 Apple ID 注册流程，包括验证步骤：

```php
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpAppleClient\DataConstruct\AppleId;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// 创建连接器
$appleIdConnector = new AppleIdConnector();
$appleIdConnector->withHeaderSynchronizeDriver(new ArrayStoreHeaderSynchronize());

// 获取微件账户信息
$response = $appleIdConnector->getAccountResource()->widgetAccount(
    widgetKey: 'd39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d',
    referer: 'https://www.icloud.com/',
    appContext: 'icloud',
    lv: '0.3.16'
);

// 创建验证信息
$verificationInfo = VerificationInfo::from([
    'id' => '',
    'answer' => '',
]);

// 生成用户信息
$firstName = '张';
$lastName = '三';
$birthday = '1990-01-01';

// 创建验证账户
$verificationAccount = VerificationAccount::from([
    'name' => 'user@example.com',
    'password' => 'password123',
    'person' => [
        'name' => [
            'firstName' => $firstName,
            'lastName' => $lastName,
        ],
        'birthday' => $birthday,
        'primaryAddress' => [
            'country' => 'CHN',
        ],
    ],
    'preferences' => [
        'preferredLanguage' => $response->getLocale(),
        'marketingPreferences' => [
            'appleNews' => false,
            'appleUpdates' => true,
            'iTunesUpdates' => true,
        ],
    ],
    'verificationInfo' => $verificationInfo,
]);

// 手机验证设置
$phoneNumberVerification = PhoneNumberVerification::from([
    'phoneNumber' => [
        'id' => 1,
        'number' => '13800138000',
        'countryCode' => 'CN',
        'countryDialCode' => '86',
        'nonFTEU' => true,
    ],
    'mode' => 'sms',
]);

// 处理验证码
$captchaResponse = $appleIdConnector->getAccountResource()->captcha(
    $response->appleSessionId(),
    'd39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d'
);

$captcha = Captcha::from([
    'id' => $captchaResponse->getId(),
    'token' => $captchaResponse->getToken(),
    'answer' => 'captcha-answer',
]);

// 创建验证对象
$validate = new Validate(
    $phoneNumberVerification,
    $verificationAccount,
    $captcha,
    false
);

// 验证 Apple ID
$appleIdConnector->getAccountResource()->appleid(
    'user@example.com',
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// 验证密码
$appleIdConnector->getAccountResource()->password(
    'user@example.com',
    'password123',
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// 提交验证
$validationResponse = $appleIdConnector->getAccountResource()->validate(
    validateDto: $validate,
    appleIdSessionId: $response->appleSessionId(),
    appleWidgetKey: $response->getWidgetKey()
);

// 发送邮箱验证码
$data = SendVerificationEmail::from([
    'account' => [
        'name' => 'user@example.com',
        'person' => [
            'name' => [
                'firstName' => $verificationAccount->person->name->firstName,
                'lastName' => $verificationAccount->person->name->lastName,
            ],
        ],
    ],
    'countryCode' => 'CHN',
]);

$emailResponse = $appleIdConnector
    ->getAccountResource()
    ->sendVerificationEmail($data, $response->appleSessionId(), $response->getWidgetKey())
    ->dto();

// 验证邮箱验证码
$verificationPut = VerificationEmail::from([
    'name' => 'user@example.com',
    'verificationInfo' => $validate->account->verificationInfo,
]);

$emailVerificationResponse = $appleIdConnector->getAccountResource()->verificationEmail(
    $verificationPut,
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// 发送手机验证码
$phoneCodeResponse = $appleIdConnector->getAccountResource()->sendVerificationPhone(
    $validate,
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// 验证手机验证码
$phoneVerificationResponse = $appleIdConnector->getAccountResource()->verificationPhone(
    $validate,
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// 完成账户创建
$accountResponse = $appleIdConnector->getAccountResource()->account(
    validateDto: $validate,
    appleIdSessionId: $response->appleSessionId(),
    appleWidgetKey: $response->getWidgetKey()
);
```

### 错误处理

客户端包含针对各种苹果 API 错误场景的专用异常类：

```php
use Weijiajia\SaloonphpAppleClient\Exception\UnauthorizedException;
use Weijiajia\SaloonphpAppleClient\Exception\AccountLockoutException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\AppleException;

try {
    $response = $connector->send($request);
} catch (UnauthorizedException $e) {
    // 处理认证错误
    echo "认证失败: " . $e->getMessage();
} catch (AccountLockoutException $e) {
    // 处理账户锁定
    echo "账户已锁定: " . $e->getMessage();
} catch (VerificationCodeException $e) {
    // 处理验证码问题
    echo "验证码错误: " . $e->getMessage();
} catch (AppleException $e) {
    // 处理一般苹果 API 错误
    echo "苹果 API 错误: " . $e->getMessage();
}
```

## 高级用法

### Cookie 管理

```php
use Weijiajia\SaloonphpCookiePlugin\Driver\FileCookieJar;

// 配置 Cookie 存储
$cookieJar = new FileCookieJar('/path/to/cookies.json');
$connector->withCookieJar($cookieJar);
```

### 日志记录

```php
use Weijiajia\SaloonphpLogsPlugin\Driver\FileLogDriver;

// 配置日志
$logger = new FileLogDriver('/path/to/logs');
$connector->withLogger($logger);
```

### 头信息同步

```php
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// 配置头信息同步
$headerSynchronize = new ArrayStoreHeaderSynchronize();
$connector->withHeaderSynchronizeDriver($headerSynchronize);
```

### 使用代理
```php
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\HttpProxyManager\Data\Proxy;


$proxySplQueue = new ProxySplQueue(roundRobinEnabled: true);
$proxySplQueue->enqueue(new Proxy(host:'127.0.0.1',port:'10809',username:"xxxx",password:'xxxx',url:'http://user-xxxx_password@127.0.0.1:10809'));
$connector->withProxyQueue($proxySplQueue);

```

## 许可证

本软件包是根据 [MIT 许可证](LICENSE) 授权的开源软件。 