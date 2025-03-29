<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use Weijiajia\SaloonphpAppleClient\Contracts\AppleIdInterface;

class AppleId extends Data implements AppleIdInterface
{
    public function __construct(
        public string $appleId,
        public ?string $uri  = null,
        public ?string $password = null,
        public ?string $bindPhone = null,
        public ?string $bindPhoneAddress = null,
        public ?string $dsid = null,
        public string $accountCountryCode = 'CHN'
    ) {
    }

    public function getEmailUri(): ?string
    {
        return $this->uri;
    }

    public function getPhoneUri(): ?string
    {
        return $this->bindPhoneAddress;
    }

    public function getDsid(): ?string
    {
        return $this->dsid;
    }

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
