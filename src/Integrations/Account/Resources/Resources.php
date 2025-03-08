<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Account\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\Account\AccountConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\Request\Account;

class Resources
{
    public function __construct(
        protected AccountConnector $connector,
    ) {
    }

    public function account()
    {
        return $this->connector->send(new Account());
    }
}