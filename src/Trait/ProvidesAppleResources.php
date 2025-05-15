<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Weijiajia\SaloonphpAppleClient\Resource\Account\AccountResource;
use Weijiajia\SaloonphpAppleClient\Resource\AppleId\AppleIdResource;
use Weijiajia\SaloonphpAppleClient\Resource\Icloud\IcloudResource;
use Weijiajia\SaloonphpAppleClient\Resource\SetupIcloud\FamilyResources;
trait ProvidesAppleResources
{
    protected ?IcloudResource $icloudResource = null;
    protected ?AppleIdResource $appleIdResource = null;
    protected ?AccountResource $accountResource = null;
    protected ?FamilyResources $familyResources = null;


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

    public function familyResources(): FamilyResources
    {
        return $this->familyResources ??= new FamilyResources($this);
    }
}