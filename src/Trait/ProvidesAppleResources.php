<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpAppleClient\Resource\Account\AccountResource;
use Weijiajia\SaloonphpAppleClient\Resource\AppleId\AppleIdResource;
use Weijiajia\SaloonphpAppleClient\Resource\Icloud\IcloudResource;

trait ProvidesAppleResources
{
    protected ?IcloudResource $icloudResource = null;
    protected ?AppleIdResource $appleIdResource = null;
    protected ?AccountResource $accountResource = null;


    public function icloudResource(): IcloudResource
    {
        return $this->icloudResource ??= new IcloudResource($this);
    }

    public function appleIdResource(): AppleIdResource
    {
        return $this->appleIdResource ??= new AppleIdResource($this);
    }

    public function accountResource(): AccountResource
    {
        return $this->accountResource ??= new AccountResource($this);
    }
}