<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

use App\Models\Account as AccountModel;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class Account extends Data
{

    public function __construct(
        public string $account,
        public string $password,
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

    public function model(): AccountModel
    {
        return AccountModel::where('account', $this->getAccount())->firstOrFail();
    }

    public function getSessionId(): string
    {
        return md5(sprintf('%s_%s', $this->getAccount(), $this->getPassword()));
    }

    public function getAccount(): string
    {
        return $this->account;
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
