<?php

namespace Weijiajia\SaloonphpAppleClient\Resource\Account;

use Weijiajia\SaloonphpAppleClient\Resource\Idmsa\IdmsaResource;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\IdmsaConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Account\AccountConnector;

class AccountResource extends IdmsaResource
{
    protected ?AccountConnector $accountConnector = null;

    public function idmsaConnector(): IdmsaConnector
    {        
        return $this->idmsaConnector ?? new IdmsaConnector($this->appleId(),'af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3','https://account.apple.com');
    }

    public function accountConnector(): AccountConnector
    {
        return $this->accountConnector ?? new AccountConnector($this->appleId());
    }
}
