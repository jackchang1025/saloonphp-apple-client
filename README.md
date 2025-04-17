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

## Advanced Usage

### Cookie Management

```php
use Weijiajia\SaloonphpCookiePlugin\Driver\FileCookieJar;

// Configure cookie jar
$cookieJar = new FileCookieJar('/path/to/cookies.json');
$connector->withCookieJar($cookieJar);
```

### Logging

```php
use Weijiajia\SaloonphpLogsPlugin\Driver\FileLogDriver;

// Configure logger
$logger = new FileLogDriver('/path/to/logs');
$connector->withLogger($logger);
```

### Header Synchronization

```php
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// Configure header synchronization
$headerSynchronize = new ArrayStoreHeaderSynchronize();
$connector->withHeaderSynchronizeDriver($headerSynchronize);
```

### Proxy Queue
```php
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\HttpProxyManager\Data\Proxy;


$proxySplQueue = new ProxySplQueue(roundRobinEnabled: true);
$proxySplQueue->enqueue(new Proxy(host:'127.0.0.1',port:'10809',username:"xxxx",password:'xxxx',url:'http://user-xxxx_password@127.0.0.1:10809'));
$connector->withProxyQueue($proxySplQueue);

```

```php
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// Configure header synchronization
$headerSynchronize = new ArrayStoreHeaderSynchronize();
$connector->withHeaderSynchronizeDriver($headerSynchronize);
```

### Basic Usage

```php
// Import the necessary classes
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpLogsPlugin\Driver\FileLogDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// Create a connector instance
$connector = new AppleIdConnector();

// Enable debugging
$connector->debug();

// Configure logging
$logger = new FileLogDriver('/path/to/logs');
$connector->withLogger($logger);

// Configure header synchronization
$connector->withHeaderSynchronizeDriver(new ArrayStoreHeaderSynchronize());

// Configure proxy if needed
$connector->withProxyQueue($proxySplQueue);

// Make requests
$response = $connector->send(new SomeAppleRequest());

// Handle responses
$data = $response->dto();
```

## Available Integrations

### Apple ID (AppleId)

AppleId integration provides access to Apple ID management functionality.

```php
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\LoginRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\SecurityCodeRequest;

// Create connector
$appleIdConnector = new AppleIdConnector();

// Login with Apple ID
$loginResponse = $appleIdConnector->send(new LoginRequest([
    'apple_id' => 'user@example.com',
    'password' => 'your_password'
]));

// Handle 2FA if needed
if ($loginResponse->requiresSecurityCode()) {
    $securityResponse = $appleIdConnector->send(new SecurityCodeRequest([
        'code' => '123456'
    ]));
}

// Access different resources
$accountResource = $appleIdConnector->getAccountResource();
$bootstrapResource = $appleIdConnector->getBootstrapResources();
$securityDevicesResource = $appleIdConnector->getSecurityDevicesResources();
$securityPhoneResource = $appleIdConnector->getSecurityPhoneResources();
$paymentResource = $appleIdConnector->getPaymentResources();
```

### iCloud Services (Icloud)

Access to iCloud services including family sharing management.

```php
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\SetupIcloudConnector;

// Create connector
$icloudConnector = new SetupIcloudConnector();

// Access family resources
$familyResources = $icloudConnector->getFamilyResources();

// Get family members
$familyMembers = $familyResources->getMembers();

// Access authentication resources
$authenticateResources = $icloudConnector->getAuthenticateResources();

// Setup resources
$setupResources = $icloudConnector->setupWResources();
```

### Purchase API (Buy)

Interface with Apple's purchasing system.

```php
use Weijiajia\SaloonphpAppleClient\Integrations\Buy\BuyConnector;

// Create connector
$buyConnector = new BuyConnector();

// Get resources
$resources = $buyConnector->getResources();

// Purchase an app
$purchaseResponse = $resources->purchase([
    'productId' => 'com.example.app', 
    'price' => '0.99',
    'currency' => 'USD'
]);

// Get purchase history
$history = $resources->getPurchaseHistory();
```

### Report Problem (ReportProblem)

Interface for reporting issues with purchased content.

```php
use Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\ReportProblemConnector;

// Create connector
$reportConnector = new ReportProblemConnector();

// Get resources
$resources = $reportConnector->getResources();

// Report a problem with a purchase
$reportResponse = $resources->reportProblem([
    'purchaseId' => '1234567890',
    'issueType' => 'DOES_NOT_WORK',
    'comments' => 'The app crashes on startup'
]);
```

### Apple ID Registration for icloud.com

Complete flow for registering a new Apple ID with verification steps:

```php
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\AppleIdConnector;
use Weijiajia\SaloonphpAppleClient\DataConstruct\AppleId;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Driver\ArrayStoreHeaderSynchronize;

// Create connector
$appleIdConnector = new AppleIdConnector();
$appleIdConnector->withHeaderSynchronizeDriver(new ArrayStoreHeaderSynchronize());

// Get widget account information
$response = $appleIdConnector->getAccountResource()->widgetAccount(
    widgetKey: 'd39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d',
    referer: 'https://www.icloud.com/',
    appContext: 'icloud',
    lv: '0.3.16'
);

// Create verification info
$verificationInfo = VerificationInfo::from([
    'id' => '',
    'answer' => '',
]);

// Generate user information
$firstName = 'John';
$lastName = 'Doe';
$birthday = '1990-01-01';

// Create verification account
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
            'country' => 'USA',
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

// Phone verification setup
$phoneNumberVerification = PhoneNumberVerification::from([
    'phoneNumber' => [
        'id' => 1,
        'number' => '5551234567',
        'countryCode' => 'US',
        'countryDialCode' => '1',
        'nonFTEU' => true,
    ],
    'mode' => 'sms',
]);

// Handle captcha
$captchaResponse = $appleIdConnector->getAccountResource()->captcha(
    $response->appleSessionId(),
    'd39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d'
);

$captcha = Captcha::from([
    'id' => $captchaResponse->getId(),
    'token' => $captchaResponse->getToken(),
    'answer' => 'captcha-answer',
]);

// Create validation object
$validate = new Validate(
    $phoneNumberVerification,
    $verificationAccount,
    $captcha,
    false
);

// Verify Apple ID
$appleIdConnector->getAccountResource()->appleid(
    'user@example.com',
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// Verify password
$appleIdConnector->getAccountResource()->password(
    'user@example.com',
    'password123',
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// Submit validation
$validationResponse = $appleIdConnector->getAccountResource()->validate(
    validateDto: $validate,
    appleIdSessionId: $response->appleSessionId(),
    appleWidgetKey: $response->getWidgetKey()
);

// Send email verification code
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
    'countryCode' => 'USA',
]);

$emailResponse = $appleIdConnector
    ->getAccountResource()
    ->sendVerificationEmail($data, $response->appleSessionId(), $response->getWidgetKey())
    ->dto();

// Validate email verification code
$verificationPut = VerificationEmail::from([
    'name' => 'user@example.com',
    'verificationInfo' => $validate->account->verificationInfo,
]);

$emailVerificationResponse = $appleIdConnector->getAccountResource()->verificationEmail(
    $verificationPut,
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// Send phone verification code
$phoneCodeResponse = $appleIdConnector->getAccountResource()->sendVerificationPhone(
    $validate,
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// Validate phone verification code
$phoneVerificationResponse = $appleIdConnector->getAccountResource()->verificationPhone(
    $validate,
    $response->appleSessionId(),
    $response->getWidgetKey()
);

// Complete account creation
$accountResponse = $appleIdConnector->getAccountResource()->account(
    validateDto: $validate,
    appleIdSessionId: $response->appleSessionId(),
    appleWidgetKey: $response->getWidgetKey()
);
```

### Error Handling

The client includes specialized exception classes for various Apple API error scenarios:

```php
use Weijiajia\SaloonphpAppleClient\Exception\UnauthorizedException;
use Weijiajia\SaloonphpAppleClient\Exception\AccountLockoutException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Exception\AppleException;

try {
    $response = $connector->send($request);
} catch (UnauthorizedException $e) {
    // Handle authentication error
    echo "Authentication failed: " . $e->getMessage();
} catch (AccountLockoutException $e) {
    // Handle account lockout
    echo "Account locked: " . $e->getMessage();
} catch (VerificationCodeException $e) {
    // Handle verification code issues
    echo "Verification code error: " . $e->getMessage();
} catch (AppleException $e) {
    // Handle general Apple API errors
    echo "Apple API error: " . $e->getMessage();
}
```



## License

This package is open-sourced software licensed under the [MIT license](LICENSE). 