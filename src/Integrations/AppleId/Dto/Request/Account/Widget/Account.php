<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Widget;

use Illuminate\Support\Arr;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class Account extends Data
{
    protected ?array $direct = null;

    public function direct(?string $key = null, ?string $default = null): mixed
    {
        if (null === $this->direct) {
            $this->direct = $this->parseBootArgs($this->getResponse())['direct'] ?? null;

            if (null === $this->direct) {
                throw new \InvalidArgumentException('direct not found');
            }
        }

        if (null === $key) {
            return $this->direct;
        }

        return Arr::get($this->direct, $key, $default);
    }

    public function locale(): string
    {
        $locale = $this->direct('config.localizedResources.locale');
        if (null === $locale) {
            throw new \InvalidArgumentException('locale not found');
        }

        return $locale;
    }

    public function appleSessionId(): string
    {
        $sessionId = $this->direct('sessionId');
        if (null === $sessionId) {
            throw new \InvalidArgumentException('sessionId not found');
        }

        return $sessionId;
    }

    public function widgetKey(): string
    {
        $widgetKey = $this->direct('widgetKey');
        if (null === $widgetKey) {
            throw new \InvalidArgumentException('widgetKey not found');
        }

        return $widgetKey;
    }

    /**
     * @throws \JsonException
     */
    protected function parseBootArgs(Response $response): array
    {
        $crawler = $response->dom();
        $script = $crawler->filter('script#boot_args');
        if (0 === $script->count()) {
            throw new \InvalidArgumentException('boot_args not found');
        }

        $json = json_decode($script->text(), true, 512, JSON_THROW_ON_ERROR);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException('Invalid JSON format');
        }

        return $json;
    }
}
