<?php

namespace Weijiajia\SaloonphpAppleClient\Response;


use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\Helpers\PlistXmlParser;


trait XmlResponseHandler
{
    public function xmlToCollection(): Collection
    {
        return (new PlistXmlParser())->xmlParse($this->xml());
    }
}
