<?php

namespace Weijiajia\SaloonphpAppleClient\Contracts;

interface AppleIdInterface
{
    public function getAppleId(): string;

    public function getPassword(): ?string;

    public function getEmailUri(): ?string;

    public function getPhoneUri(): ?string;

}