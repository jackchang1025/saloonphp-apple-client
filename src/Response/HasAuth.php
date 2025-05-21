<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Response;

trait HasAuth
{
    /**
     * @throws \JsonException
     */
    public function authorizeSing(): ?array
    {
        $document = $this->dom()
            ->filter('script[type="application/json"].boot_args')
            ->first()
        ;

        if (!$document->count()) {
            return null;
        }

        // 获取 script 标签的内容
        $jsonString = $document->text();

        // 解码 JSON 数据
        $data = json_decode($jsonString, true, 512, JSON_THROW_ON_ERROR);

        if (null === $data && JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException('JSON解析错误: '.json_last_error_msg());
        }

        return $data;
    }

    /**
     * @throws \JsonException
     */
    public function hasTrustedDevices(): bool
    {
        return data_get($this->authorizeSing(), 'direct.hasTrustedDevices', false);
    }
}
