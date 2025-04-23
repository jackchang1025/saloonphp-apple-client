<?php

namespace App\Services\Resource\AccountManager;

use App\Services\Phone\Contracts\Phone;

class AddSecurityVerifyPhoneResource
{
    public function __construct(protected AccountManagerResource $accountManagerResource)
    {
    }

    public function accountManagerResource(): AccountManagerResource
    {
        return $this->accountManagerResource;
    }

    public function addSecurityVerifyPhone(Phone $phone): void
    {
     
        $this->accountManagerResource()
        ->signInResource()
        ->signIn(
            $this->accountManagerResource()
            ->apple()
            ->appleId()
            ->getAppleId(), 
            $this->accountManagerResource()
            ->apple()
            ->appleId()
            ->getPassword()
        );

        $auth = $this->accountManagerResource()->signInResource()->appleAuth();


        $this->accountManagerResource()->sendPhoneSecurityCode($phone->phone());

        // 获取验证码
        $code = $phone->attemptMobileVerificationCode();

        //验证手机验证码
        $this->accountManagerResource()->apple()->idmsaConnector()->getAuthenticateResources()->verifyPhoneCode($code);


    }
    
    
}
