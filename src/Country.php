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

            if(Countries::alpha3CodeExists($country)){
                $this->country = Countries::getAlpha2Code($country);
                return;
            }

            if(Countries::numericCodeExists($country)){
                $this->country = Countries::getAlpha2FromNumeric($country);
                return;
            }

            $countryNames = Countries::getNames('en'); // 或其他语言

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
}
