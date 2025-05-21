<?php

namespace Weijiajia\SaloonphpAppleClient\Contracts;

interface CalculateAppleHc
{
    public function version(): int;

    public function date(): string;
}
