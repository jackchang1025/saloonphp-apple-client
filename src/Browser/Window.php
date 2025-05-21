<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Browser;

class Window
{
    public ?Document $document = null;
    public ?Navigator $navigator = null;
    public ?Screen $screen = null;
    public ?Location $location = null;

    public int $innerHeight = 1605;
    public int $innerWidth = 3008;
    public int $outerHeight = 1692;
    public int $outerWidth = 3008;
    public int $devicePixelRatio = 2;

    // private ?LoggerInterface $logger;

    public function __construct() // Inject logger if needed
    {
        $this->document = new Document();
        $this->navigator = new Navigator();
        $this->screen = new Screen();
        $this->location = new Location();
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        // Ensure components are initialized before calling toArray()
        $documentArray = $this->document ? $this->document->toArray() : null;
        $navigatorArray = $this->navigator ? $this->navigator->toArray() : null;
        $screenArray = $this->screen ? $this->screen->toArray() : null;
        $locationArray = $this->location ? $this->location->toArray() : null;

        return [
            'innerHeight' => $this->innerHeight,
            'innerWidth' => $this->innerWidth,
            'outerHeight' => $this->outerHeight,
            'outerWidth' => $this->outerWidth,
            'devicePixelRatio' => $this->devicePixelRatio,
            // Note: We explicitly list properties instead of using get_object_vars
            // to control what gets exposed and handle nested objects.
            'document' => $documentArray,
            'navigator' => $navigatorArray,
            'screen' => $screenArray,
            'location' => $locationArray, // location might not need toArray if not complex
        ];

        // if ($this->logger) {
        //     $this->logger->warning('Window data: ', $ret);
        // }
    }
}
