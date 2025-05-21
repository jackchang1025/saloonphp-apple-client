<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Response;

use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Phone;

trait HasPhoneNumbers
{
    /**
     * @throws \JsonException
     */
    public function getTrustedPhoneNumber(): ?Phone
    {
        $data = data_get($this->authorizeSing(), 'direct.twoSV.phoneNumberVerification.trustedPhoneNumber');

        return $data ? new Phone($data) : null;
    }

    /**
     * 获取所有信任的电话号码
     *
     * @return Collection<int,Phone>
     *
     * @throws \JsonException
     */
    public function getTrustedPhoneNumbers(): Collection
    {
        return collect(data_get($this->authorizeSing(), 'direct.twoSV.phoneNumberVerification.trustedPhoneNumbers', []))
            ->map(fn (array $phone) => new Phone($phone))
        ;
    }

    /**
     * 获取电话号码验证信息.
     *
     * @throws \JsonException
     */
    public function phoneNumberVerification(): ?array
    {
        return $this->json('phoneNumberVerification');
    }
}
