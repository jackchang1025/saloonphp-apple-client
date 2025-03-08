

# Saloonphp Apple Client

[中文文档](README.zh-CN.md) | English

A PHP client for Apple's APIs built with [Saloon](https://github.com/saloonphp/saloon).

## Features

- Complete Apple API integration for various services:
  - Apple ID management
  - iCloud services
  - Account management
  - Authentication services
  - Buy/Purchase API
  - Report Problem services
- Built-in error handling for Apple-specific errors
- Cookie management for authenticated sessions
- HTTP proxy support
- Header synchronization
- Logging capabilities
- XML and Plist response parsing

## Requirements

- PHP 8.0 or higher
- Saloon v3.0+

## Installation

```bash
composer require weijiajia/saloonphp-apple-client
```

## Usage

### Basic Usage

```php
// Create a connector instance
$connector = new AppleIdConnector();

// Configure proxy if needed
$connector->setProxy('http://proxy.example.com:8080');

// Make requests
$response = $connector->send(new SomeAppleRequest());

// Handle responses
$data = $response->getData();
```

### Authentication

```php
// Authenticate with Apple ID
$response = $connector->send(new LoginRequest([
    'apple_id' => 'user@example.com',
    'password' => 'your_password'
]));

// Handle 2FA if needed
if ($response->requiresSecurityCode()) {
    $securityResponse = $connector->send(new SecurityCodeRequest([
        'code' => '123456'
    ]));
}
```

### Error Handling

The client includes specialized exception classes for various Apple API error scenarios:

```php
try {
    $response = $connector->send($request);
} catch (UnauthorizedException $e) {
    // Handle authentication error
} catch (AccountLockoutException $e) {
    // Handle account lockout
} catch (VerificationCodeException $e) {
    // Handle verification code issues
} catch (AppleException $e) {
    // Handle general Apple API errors
}
```

## Available Integrations

- AppleId
- Icloud
- Account
- Authentication
- Buy (Purchase API)
- ReportProblem
- WebIcloud
- Idmsa

## License

This package is open-sourced software licensed under the [MIT license](LICENSE). 