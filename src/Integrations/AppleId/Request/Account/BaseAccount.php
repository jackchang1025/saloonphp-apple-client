<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account;

use GuzzleHttp\Cookie\CookieJarInterface as GuzzleCookieJarInterface;
use Random\RandomException;
use Weijiajia\SaloonphpAppleClient\Contracts\HasSleepInterface;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpAppleClient\Plugins\HasClientInfo;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSleep;
use Weijiajia\SaloonphpCookiePlugin\Contracts\CookieJarInterface;
use Weijiajia\SaloonphpCookiePlugin\HasCookie;

abstract class BaseAccount extends Request implements HasSleepInterface, CookieJarInterface
{
    use HasSleep;
    use HasCookie;
    use HasClientInfo;

    /**
     * @throws RandomException
     */
    public function sleep(): float
    {
        return random_int(1, 3);
    }

    public function getCookieJar(): ?GuzzleCookieJarInterface
    {
        return null;
    }
}
