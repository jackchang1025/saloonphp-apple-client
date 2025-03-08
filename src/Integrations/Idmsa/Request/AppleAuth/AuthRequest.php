<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth\Auth as AuthResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class AuthRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth';
    }

    /**
     * @throws \JsonException
     */
    public function createDtoFromResponse(Response $response): AuthResponse
    {
        $document = $response->dom()
            ->filter('script[type="application/json"].boot_args')
            ->first();

        if (!$document->count()) {
            throw new \RuntimeException('未找到 boot_args 节点');
        }

        // 获取 script 标签的内容
        $jsonString = $document->text();

        // 解码 JSON 数据
        $data = json_decode($jsonString, true, 512, JSON_THROW_ON_ERROR);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('JSON解析错误: '.json_last_error_msg());
        }

        return AuthResponse::from($data);
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'text/html',
            'Content-Type' => 'application/json',
        ];
    }
}
