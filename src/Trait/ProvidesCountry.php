<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpAppleClient\Country as CountryContract;

trait ProvidesCountry
{
    protected ?CountryContract $memoizedCountry = null;

    /**
     * 获取国家/地区
     */
    public function country(): ?CountryContract
    {
        return $this->memoizedCountry;
    }

     /**
      * 设置或替换国家/地区实例
      */
     public function withCountry(string|CountryContract $country): static
     {
         $this->memoizedCountry = is_string($country) ? CountryContract::make(country: $country) : $country;
         return $this;
     }
}