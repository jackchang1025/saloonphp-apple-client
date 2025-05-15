<?php

namespace Weijiajia\SaloonphpAppleClient\Exception\Family;

use Weijiajia\SaloonphpAppleClient\Exception\AppleException;

class FamilyException extends AppleException
{
    public static function loginInvalid(): self
    {
        return new self('登录信息失效，请重新登录');
    }

    public static function alreadyMember(): self
    {
        return new self('您已经是家庭成员，无需重复创建');
    }

    public static function notFamilyMember(): self
    {
        return new self('当前账号没有加入家庭共享组');
    }

    public static function organizerCannotLeave(): self
    {
        return new self('组织者不能直接退出，请先转移组织者身份或解散家庭组');
    }

    public static function notOrganizer(): self
    {
        return new self('请使用组织者账号操作');
    }

    public static function message(string $message): self
    {
        return new self($message);
    }
}
