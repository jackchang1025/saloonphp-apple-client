<?php

namespace Weijiajia\SaloonphpAppleClient\DataConstruct;

class PhoneNumber extends Data
{
    /**
     * @param string $numberWithDialCode 带国际区号的完整电话号码
     * @param string $pushMode 推送模式
     * @param string $obfuscatedNumber 部分隐藏的电话号码
     * @param string $lastTwoDigits 电话号码的最后两位数字
     * @param int $id 电话号码的唯一标识符
     */
    public function __construct(
        public string $numberWithDialCode,
        public string $pushMode,
        public string $obfuscatedNumber,
        public string $lastTwoDigits,
        public int $id
    ) {
    }
}
