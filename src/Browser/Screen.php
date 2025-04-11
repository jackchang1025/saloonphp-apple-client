<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Browser;

class Screen
{
    public int $colorDepth = 24;
    public int $height = 1692;
    public int $width = 3008;
    /** @var array{angle: int} */
    public array $orientation = ["angle" => 0];
    public int $availWidth = 3008;
    public int $availHeight = 1692;
    public int $availLeft = 0;
    public int $availTop = 0;

    // Add methods if needed, e.g., a constructor or getters

    /**
     * @return array<string, int|array{angle: int}>
     */
    public function toArray(): array
    {
        return [
            'colorDepth' => $this->colorDepth,
            'height' => $this->height,
            'width' => $this->width,
            'orientation' => $this->orientation,
            'availWidth' => $this->availWidth,
            'availHeight' => $this->availHeight,
            'availLeft' => $this->availLeft,
            'availTop' => $this->availTop,
            // Add other relevant properties from the Python class if they exist
            // 'deviceXDPI' => $this->deviceXDPI ?? 'undefined', // Handle potentially missing props
            // 'deviceYDPI' => $this->deviceYDPI ?? 'undefined',
            // 'fontSmoothingEnabled' => $this->fontSmoothingEnabled ?? 'undefined',
            // 'updateInterval' => $this->updateInterval ?? 'undefined',
        ];
    }
} 