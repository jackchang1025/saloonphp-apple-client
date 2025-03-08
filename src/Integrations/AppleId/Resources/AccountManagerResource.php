<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\AccountManager;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Account\AccountManageRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;

class AccountManagerResource extends BaseResource
{
    public function account(): AccountManager
    {
        return $this->connector->send(new AccountManageRequest())->dto();
    }
}
