<?php

namespace Weijiajia\SaloonphpAppleClient\Contracts;

interface Phone
{
    public function phone(): string;

    public function phoneUri(): ?string;

    public function countryCode(): string;

    public function countryCodeAlpha3(): string;

    public function countryDialCode(): string;

    public function format(null|int|string $format = null): string;

    public function id(): ?string;

    public function attemptMobileVerificationCode(int $attempts = 5): ?string;

    public function cancelMobile();

    public function banMobile();

    public function finishMobile();
}
