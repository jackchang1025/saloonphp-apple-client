<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpAppleClient\Country;

trait ProvidesCountry
{
    protected ?Country $country = null;

    /**
     * 获取国家/地区
     */
    public function country(): ?Country
    {
        return $this->country;
    }

     /**
      * 设置或替换国家/地区实例
      */
     public function withCountry(string|Country $country): static
     {
         $this->country = is_string($country) ? Country::make(country: $country) : $country;
         return $this;
     }
}