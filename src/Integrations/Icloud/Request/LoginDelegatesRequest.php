<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request;

use Weijiajia\SaloonphpAppleClient\Exception\AppleRequestException\LoginRequestException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\LoginDelegates;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasXmlBody;
use Throwable;

class LoginDelegatesRequest extends Request implements HasBody
{
    use HasXmlBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/setup/iosbuddy/loginDelegates';
    }

    public function __construct(
        protected readonly string $appleId,
        protected readonly string $password,
        protected readonly ?string $authCode = null,
        protected readonly string $protocolVersion = '4',
        protected readonly string $clientId = '67BDADCA-6E66-7ED7-A01A-5EB3C5D95CE3',
    ) {

    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator($this->appleId, $this->password);
    }

    public function hasRequestFailed(Response $response): ?bool
    {
        if ($response->ok() && !$response->dto()->isSuccess()) {
            return true;
        }

        return null;
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
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
                response: $response,
                message: $data->statusMessage,
                previous: $senderException
            );
        }

        return new LoginRequestException(
            response: $response,
            message: $data->statusMessage,
            previous: $senderException
        );
    }

    public function defaultHeaders(): array
    {
        return [
            "accept-language"   => "zh-cn",
            "user-agent"        => "Accounts/113 CFNetwork/711.2.23 Darwin/14.0.0",
            "accept"            => "*/*",
            "connection"        => "keep-alive",
            "x-mme-client-info" => "<iPhone7,1> <iPhone OS;8.1;12B411> <com.apple.AppleAccount/1.0 (com.apple.Accounts/113)>",
            "proxy-connection"  => "keep-alive",
            "x-mme-country"     => "CN",
            "Accept-Encoding"   => "gzip, deflate",
            "Host"              => "setup.icloud.com",
        ];
    }

    /**
     * @param Response $response
     * @return LoginDelegates
     */
    public function createDtoFromResponse(Response $response): LoginDelegates
    {
        return loginDelegates::from($response->xmlToCollection()->toArray());
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
