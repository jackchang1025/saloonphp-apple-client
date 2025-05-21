<?php

use Weijiajia\SaloonphpAppleClient\Browser\Browser;
use Weijiajia\SaloonphpAppleClient\Helpers\Fingerprint;
use Weijiajia\SaloonphpAppleClient\Services\DCHelper;

it('createFingerprint', function () {
    $fingerprint = Fingerprint::createFingerprint('America/Toronto');

    expect($fingerprint)->toBeString();
});

it('validate', function () {
    $browser = new Browser(userAgent: 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', timezone: 'America/Toronto', language: 'en-CA');
    $DCHelper = new DCHelper($browser);

    expect($DCHelper->validate())->toBeString();
});
