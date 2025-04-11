<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Widget;

use Illuminate\Support\Arr;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use InvalidArgumentException;
use Saloon\Http\Response;
use JsonException;

class Account extends Data
{
    protected ?array $direct = null;

    public function direct(?string $key = null, ?string $default = null): mixed
    {
        if ($this->direct === null) {

            $this->direct = $this->parseBootArgs($this->getResponse())['direct'] ?? null;

            if ($this->direct === null) {
                throw new InvalidArgumentException('direct not found');
            }
        }

        if ($key === null) {
            return $this->direct;
        }

        return Arr::get($this->direct, $key, $default);
    }

        /**
     * @throws JsonException
     */
    protected function parseBootArgs(Response $response): array
    {
        $crawler = $response->dom();
        $script  = $crawler->filter('script#boot_args');
        if ($script->count() === 0) {
            throw new InvalidArgumentException('boot_args not found');
        }

        $json = json_decode($script->text(), true, 512, JSON_THROW_ON_ERROR);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('Invalid JSON format');
        }

        return $json;
    }

    public function locale(): string
    {
        $locale = $this->direct('config.localizedResources.locale');
        if ($locale === null) {
            throw new InvalidArgumentException('locale not found');
        }

        return $locale;
    }

    public function appleSessionId(): string
    {
        $sessionId = $this->direct('sessionId');
        if ($sessionId === null) {
            throw new InvalidArgumentException('sessionId not found');
        }
        return $sessionId;
    }

    public function widgetKey(): string
    {
        $widgetKey = $this->direct('widgetKey');
        if ($widgetKey === null) {
            throw new InvalidArgumentException('widgetKey not found');
        }
        return $widgetKey;
    }
}