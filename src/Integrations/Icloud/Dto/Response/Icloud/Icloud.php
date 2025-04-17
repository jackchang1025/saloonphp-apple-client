<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\Icloud;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Symfony\Component\DomCrawler\Crawler;

class Icloud extends Data
{
    public function __construct(
        protected Crawler $crawler,
        protected ?string $clientBuildNumber = null,
        protected ?string $clientMasteringNumber = null,
    ) {
    }

    public function clientBuildNumber(): ?string
    {
        //<html lang="en-us" data-cw-private-path-prefix="" data-cw-private-build-number="2513Project49" data-cw-private-mastering-number="2513B20">
        return $this->clientBuildNumber ??= $this->crawler->filter('html')?->attr('data-cw-private-build-number');
    }       

    public function clientMasteringNumber(): ?string
    {
        //<html lang="en-us" data-cw-private-path-prefix="" data-cw-private-build-number="2513Project49" data-cw-private-mastering-number="2513B20">
        return $this->clientMasteringNumber ??= $this->crawler->filter('html')?->attr('data-cw-private-mastering-number');
    }

    
}