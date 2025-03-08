<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\Auth;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\DataConstruct\PhoneNumber;
use Saloon\Http\Response;
use Spatie\LaravelData\DataCollection;

class Auth extends Data
{
    /**
     * @param Direct $direct 直接相关的数据
     * @param Additional $additional 额外的数据
     */
    public function __construct(
        public Direct $direct,
        public Additional $additional
    ) {
    }

    public function getTrustedPhoneNumbers(): DataCollection
    {
        return $this->direct->twoSV->phoneNumberVerification->trustedPhoneNumbers;
    }

    public function filterTrustedPhone(string $phone): DataCollection
    {
        // 提取最后两位数字
        $lastTwo = substr($phone, -2);

        return $this->getTrustedPhoneNumbers()->filter(
            function (PhoneNumber $trustedPhone) use ($lastTwo, $phone) {
                // 检查最后两位数字是否匹配
                $lastTwoMatch = $trustedPhone->lastTwoDigits === $lastTwo;

                // 从混淆的号码中提取国际区号 (通常是+1到+999之间)
                preg_match('/^\+\d+/', $trustedPhone->numberWithDialCode, $matches);
                $trustedDialCode = $matches[0] ?? '';

                // 检查国际区号是否匹配
                $dialCodeMatch = str_starts_with($phone, $trustedDialCode);

                return $lastTwoMatch && $dialCodeMatch;
            }
        );
    }

    public function filterTrustedPhoneById(int $id): ?PhoneNumber
    {
        return collect($this->getTrustedPhoneNumbers()->all())->first(fn($phone) => $id === $phone->id);
    }

    public function getTrustedPhoneNumber(): PhoneNumber
    {
        return $this->direct->twoSV->phoneNumberVerification->trustedPhoneNumber;
    }

    public function hasTrustedDevices(): bool
    {
        return $this->direct->hasTrustedDevices;
    }

    public static function fromResponse(Response $response): static
    {
        return self::from($response->authorizeSing());
    }
}
