<?php

namespace Weijiajia\SaloonphpAppleClient\Helpers;

use Illuminate\Support\Collection;

class PlistXmlParser
{
    /**
     * 解析plist XML字符串.
     */
    public function xmlParse(\SimpleXMLElement $simpleXMLElement): Collection
    {
        return collect($this->parseElement($simpleXMLElement));
    }

    /**
     * 解析XML元素.
     */
    protected function parseElement(\SimpleXMLElement $element): mixed
    {
        return match ($element->getName()) {
            'plist' => $this->parseElement($element->dict),
            'dict' => $this->parseDict($element),
            'array' => $this->parseArray($element),
            'integer' => (int) $element,
            'true' => true,
            'false' => false,
            default => (string) $element,
        };
    }

    /**
     * 解析dict元素.
     */
    protected function parseDict(\SimpleXMLElement $dict): array
    {
        $result = [];
        $currentKey = null;

        foreach ($dict->children() as $child) {
            if ('key' === $child->getName()) {
                $currentKey = (string) $child;
            } elseif (null !== $currentKey) {
                $result[$currentKey] = $this->parseElement($child);
                $currentKey = null;
            }
        }

        return $result;
    }

    /**
     * 解析array元素.
     */
    protected function parseArray(\SimpleXMLElement $array): array
    {
        $result = [];
        foreach ($array->children() as $child) {
            $result[] = $this->parseElement($child);
        }

        return $result;
    }
}
