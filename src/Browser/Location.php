<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Browser;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class Location
{
    public ?string $hash = null;
    public ?string $host = null;
    public ?string $hostname = null;
    public ?string $href = null;
    public ?string $origin = null;
    public ?string $pathname = null;
    public ?int $port = null; // Changed from string/None to int/null
    public ?string $protocol = null;

    public function setURL(string|UriInterface $url): void
    {
        if (is_string($url)) {
            // Assuming Guzzle PSR-7 implementation for URI parsing
            // Replace with your preferred PSR-7 URI implementation if needed
            $uri = new Uri($url);
        } elseif ($url instanceof UriInterface) {
            $uri = $url;
        } else {
            throw new \InvalidArgumentException('URL must be a string or UriInterface');
        }

        $this->href = (string) $uri;
        $this->hash = $uri->getFragment() ?: null; // PHP returns empty string, map to null
        $this->host = $uri->getHost().($uri->getPort() ? ':'.$uri->getPort() : '');
        $this->hostname = $uri->getHost();
        $this->origin = $uri->getScheme().'://'.$uri->getAuthority();
        $this->pathname = $uri->getPath();
        $this->port = $uri->getPort(); // Already int|null
        $this->protocol = rtrim($uri->getScheme(), ':'); // Remove trailing colon
    }

    /**
     * @return array<string, null|int|string>
     */
    public function toArray(): array
    {
        return [
            'hash' => $this->hash,
            'host' => $this->host,
            'hostname' => $this->hostname,
            'href' => $this->href,
            'origin' => $this->origin,
            'pathname' => $this->pathname,
            'port' => $this->port,
            'protocol' => $this->protocol,
        ];
    }
}
