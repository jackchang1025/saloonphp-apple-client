<?php

namespace Weijiajia\SaloonphpAppleClient\Trait;

use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\Contracts\Phone;
trait ManagesTrustedPhones
{
    protected ?Collection $memoizedTrustedPhones = null;

    public function trustedPhoneNumbers(): Collection
    {
        return $this->memoizedTrustedPhones ??= new Collection();
    }

    public function addTrustedPhoneNumber(Phone $phone): static
    {
        $this->memoizedTrustedPhones?->push($phone); // 更新缓存
        return $this;
    }

    public function removeTrustedPhoneNumber(Phone $phone): static
    {
        if ($this->memoizedTrustedPhones) {
             $this->memoizedTrustedPhones = $this->memoizedTrustedPhones->reject(function ($item) use ($phone) {
                 return $item->phone() === $phone->phone();
             });
        }
        return $this;
    }

    /**
     * 检查是否存在可信电话号码
     */
    public function hasTrustedPhoneNumber(Phone $phone): bool
    {
        return $this->trustedPhoneNumbers()->contains(function ($item) use ($phone) {
             return $item->phone() === $phone->phone();
        });
    }
}

