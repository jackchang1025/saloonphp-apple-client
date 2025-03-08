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
// 创建连接器实例
$connector = new AppleIdConnector();

// 配置代理（如需）
$connector->setProxy('http://proxy.example.com:8080');

// 发送请求
$response = $connector->send(new SomeAppleRequest());

// 处理响应
$data = $response->getData();
```

### 认证

```php
// 使用 Apple ID 认证
$response = $connector->send(new LoginRequest([
    'apple_id' => 'user@example.com',
    'password' => 'your_password'
]));

// 处理双因素认证（如需）
if ($response->requiresSecurityCode()) {
    $securityResponse = $connector->send(new SecurityCodeRequest([
        'code' => '123456'
    ]));
}
```

### 错误处理

客户端包含针对各种苹果 API 错误场景的专用异常类：

```php
try {
    $response = $connector->send($request);
} catch (UnauthorizedException $e) {
    // 处理认证错误
} catch (AccountLockoutException $e) {
    // 处理账户锁定
} catch (VerificationCodeException $e) {
    // 处理验证码问题
} catch (AppleException $e) {
    // 处理一般苹果 API 错误
}
```

## 可用集成

- AppleId（苹果 ID）
- Icloud（iCloud 服务）
- Account（账户管理）
- Authentication（认证）
- Buy（购买 API）
- ReportProblem（问题报告）
- WebIcloud（Web iCloud 服务）
- Idmsa（身份管理服务）

## 许可证

本软件包是根据 [MIT 许可证](LICENSE) 授权的开源软件。 