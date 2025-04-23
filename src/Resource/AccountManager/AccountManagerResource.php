<?php

namespace App\Services\Resource\AccountManager;

use App\Services\Apple;
use Weijiajia\SaloonphpAppleClient\DataConstruct\PhoneNumber;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneNotFoundException;

class AccountManagerResource
{
    public function __construct(protected Apple $apple)
    {

    }

    public function apple(): Apple
    {
        return $this->apple;
    }

    public function signInResource(): SignInResource
    {
        return new SignInResource($this);
    }

    public function addSecurityVerifyPhoneResource(): AddSecurityVerifyPhoneResource
    {
        return new AddSecurityVerifyPhoneResource($this);
    }

    /**
     * @param int|string $phone
     * @return void
     * @throws PhoneNotFoundException
     */
    public function sendPhoneSecurityCode(int|string $phone)
    {
        if (is_int($phone)) {
            return $this->apple()->idmsaConnector()->getAuthenticateResources()->sendPhoneSecurityCode($phone);
        }

        $auth = $this->signInResource()->appleAuth();

        $phoneList = $auth->filterTrustedPhone($phone);

        $phoneList->toCollection()->map(function (PhoneNumber $phone) {
            $this->apple()->idmsaConnector()->getAuthenticateResources()->sendPhoneSecurityCode($phone->id);
        });

        return $phoneList;
    }
}
