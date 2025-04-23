<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient;

use Symfony\Component\Intl\Countries;

class Country
{
    protected string $country;

    public function __construct(string $country)
    {

        $this->country = strtoupper($country);

        if(!Countries::exists(strtoupper($country))){
            // 获取所有国家的名称和代码映射
            $countryNames = Countries::getNames('en'); // 或其他语言

            // 查找匹配的国家名称（不区分大小写）
            $countryCode = array_search(mb_strtolower($country), array_map('mb_strtolower', $countryNames), true);

            if($countryCode === false){
                throw new \RuntimeException("国家未找到: {$country}");
            }

            $this->country = $countryCode;
        }

    }

    public static function make(string $country):static
    {
        return new static($country);
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getName(): string
    {
        return Countries::getName($this->country);
    }

    public static function labels(?string $displayLocale = null): array
    {

        $countries = Countries::getCountryCodes();
        $labels = [];
        foreach ($countries as $code) {
            $labels[$code] = Countries::getName($code, $displayLocale);
        }
        return $labels;
    }

    public  function getAlpha2Code(): ?string
    {
        if (strlen($this->country) === 2) {
            return strtoupper($this->country);
        }

        return Countries::getAlpha2Code($this->country);
    }

    public function getAlpha3Code(): ?string
    {
        if (strlen($this->country) === 3) {
            return strtoupper($this->country);
        }

        return Countries::getAlpha3Code($this->country);
    }

    public function getAlpha2Language(): string
    {
        $language = config("country-language.{$this->getAlpha2Code()}");
        if(empty($language)){
            throw new \RuntimeException("Language not found for country: {$this->getAlpha2Code()}");
        }
        return $language;
    }
}
