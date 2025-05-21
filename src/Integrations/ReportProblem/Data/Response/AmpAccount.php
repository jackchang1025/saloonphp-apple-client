<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\ReportProblem\Data\Response;

use Spatie\LaravelData\Data;

class AmpAccount extends Data
{
    public function __construct(
        public string $countryCodeISO2A,
        public string $countryCodeISO3A,
    ) {}
}
