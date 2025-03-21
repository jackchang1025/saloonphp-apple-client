<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleIdInterface;

class AppleId extends Data implements AppleIdInterface
{
    public function __construct(
        public string $appleId,
        public ?string $password = null,
        public ?string $bindPhone = null,
        public ?string $bindPhoneAddress = null,
        public ?string $dsid = null,
        public string $accountCountryCode = 'CHN'
    ) {
    }

    public function getDsid(): ?string
    {
        return $this->dsid;
    }

    //判断是否是大陆账号
    public function isCN(): bool
    {
        return $this->accountCountryCode === 'CHN';
    }

    public function getAccountCountryCode(): string
    {
        return $this->accountCountryCode;
    }

    public function getSessionId(): string
    {
        return md5(sprintf('%s_%s', $this->getAppleId(), $this->getPassword()));
    }

    public function getAppleId(): string
    {
        return $this->appleId;
    }

    public function getBindPhone(): ?string
    {
        return $this->bindPhone;
    }

    public function getBindPhoneAddress(): ?string
    {
        return $this->bindPhoneAddress;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
