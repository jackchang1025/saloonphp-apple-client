<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;

class AuthorizeSignInRequest extends Request
{
    protected Method $method = Method::GET;

    // frame_id: 73fc3e15-c71f-48e0-9788-0e8ca021b29e
    // language: en_CA
    // skVersion: 7
    // iframeId: 73fc3e15-c71f-48e0-9788-0e8ca021b29e
    // client_id: d39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d
    // redirect_uri: https://www.icloud.com
    // response_type: code
    // response_mode: web_message
    // state: 73fc3e15-c71f-48e0-9788-0e8ca021b29e
    // authVersion: latest
    public function __construct(
        public readonly string $frameId,
        public readonly string $iframeId,
        public readonly string $clientId,
        public readonly string $redirectUri,
        public readonly string $state,
        public readonly string $responseType = 'code',
        public readonly string $responseMode = 'web_message',
        public readonly string $language = 'en_CA',
        public readonly string $skVersion = '7',
        public readonly string $authVersion = 'latest',
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/authorize/signin';
    }

    public function defaultQuery(): array
    {
        return [
            'frame_id' => $this->frameId,
            'language' => $this->language,
            'skVersion' => $this->skVersion,
            'iframeId' => $this->iframeId,
            'client_id' => $this->clientId,
            'response_type' => $this->responseType,
            'response_mode' => $this->responseMode,
            'state' => $this->state,
            'authVersion' => $this->authVersion,
        ];
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Referer' => $this->redirectUri,
            'Sec-Fetch-Site' => 'cross-site',
            'Sec-Fetch-Mode' => 'navigate',
            'Sec-Fetch-Dest' => 'iframe',
            'Sec-Fetch-User' => '?1',
            'Upgrade-Insecure-Requests' => '1',
        ];
    }
}
