<?php
declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Browser;

class Document
{
    public string $referer = "";
    public string $domain = "";

    public function __construct()
    {
        // Constructor might be empty or initialize properties
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'referer' => $this->referer,
            'domain' => $this->domain,
        ];
    }
} 