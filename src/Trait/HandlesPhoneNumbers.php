<?php

declare(strict_types=1);

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Propaganistas\LaravelPhone\PhoneNumber;

trait HandlesPhoneNumbers
{
    public function makePhoneNumber(string $number, null|array|string $country = null): PhoneNumber
    {
        return new PhoneNumber($number, $country);
    }
}
