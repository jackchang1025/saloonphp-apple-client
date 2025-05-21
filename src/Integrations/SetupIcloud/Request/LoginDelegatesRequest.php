<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasXmlBody;
use Weijiajia\SaloonphpAppleClient\Exception\LoginRequestException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\LoginDelegates\LoginDelegates;

class LoginDelegatesRequest extends Request implements HasBody
{
    use HasXmlBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $appleId,
        public string $password,
        public ?string $authCode = null,
        public string $protocolVersion = '4',
        public string $clientId = '67BDADCA-6E66-7ED7-A01A-5EB3C5D95CE3',
    ) {}

    public function resolveEndpoint(): string
    {
        return '/setup/iosbuddy/loginDelegates';
    }

    public function hasRequestFailed(Response $response): ?bool
    {
        if ($response->ok() && !$response->dto()->isSuccess()) {
            return true;
        }

        return null;
    }

    public function getRequestException(Response $response, ?\Throwable $senderException): ?\Throwable
    {
        if (!$response->ok()) {
            return null;
        }

        /**
         * @var LoginDelegates $data
         */
        $data = $response->dto();
        if ($data->isSuccess()) {
            return null;
        }

        if ($this->authCode) {
            return new VerificationCodeException(
                message: $data->statusMessage,
                previous: $senderException
            );
        }

        return new LoginRequestException(
            message: $data->statusMessage,
            previous: $senderException
        );
    }

    public function defaultHeaders(): array
    {
        return [
            'accept-language' => 'zh-cn',
            'user-agent' => 'Accounts/113 CFNetwork/711.2.23 Darwin/14.0.0',
            'accept' => '*/*',
            'connection' => 'keep-alive',
            'x-mme-client-info' => '<iPhone7,1> <iPhone OS;8.1;12B411> <com.apple.AppleAccount/1.0 (com.apple.Accounts/113)>',
            'proxy-connection' => 'keep-alive',
            'x-mme-country' => 'CN',
            'Accept-Encoding' => 'gzip, deflate',
            'Host' => 'setup.icloud.com',
        ];
    }

    public function createDtoFromResponse(Response $response): LoginDelegates
    {
        return LoginDelegates::from($response->xmlToCollection()->toArray());
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator($this->appleId, $this->password);
    }

    protected function defaultBody(): string
    {
        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>apple-id</key>
	<string>{$this->appleId}</string>
	<key>client-id</key>
	<string>{$this->clientId}</string>
	<key>delegates</key>
	<dict>
		<key>com.apple.gamecenter</key>
		<dict/>
		<key>com.apple.mobileme</key>
		<dict/>
		<key>com.apple.private.ids</key>
		<dict>
			<key>protocol-version</key>
			<string>{$this->protocolVersion}</string>
		</dict>
	</dict>
	<key>password</key>
	<string>{$this->password}{$this->authCode}</string>
</dict>
</plist>
XML;
    }
}
