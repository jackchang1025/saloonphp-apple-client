<?php

declare(strict_types=1);
namespace Weijiajia\SaloonphpAppleClient\Helpers;
class Fingerprint {

    // 静态属性 $y, $A, $w 保持不变...
    private static $y = ["%20", ";;;", "%3B", "%2C", "und", "fin", "ed;", "%28", "%29", "%3A", "/53", "ike", "Web", "0;", ".0", "e;", "on", "il", "ck", "01", "in", "Mo", "fa", "00", "32", "la", ".1", "ri", "it", "%u", "le"];
    private static $A = ".0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz";
    private static $w = [
        1 => [4, 15], 110 => [8, 239], 74 => [8, 238], 57 => [7, 118], 56 => [7, 117],
        71 => [8, 233], 25 => [8, 232], 101 => [5, 28], 104 => [7, 111], 4 => [7, 110],
        105 => [6, 54], 5 => [7, 107], 109 => [7, 106], 103 => [9, 423], 82 => [9, 422],
        26 => [8, 210], 6 => [7, 104], 46 => [6, 51], 97 => [6, 50], 111 => [6, 49],
        7 => [7, 97], 45 => [7, 96], 59 => [5, 23], 15 => [7, 91], 11 => [8, 181],
        72 => [8, 180], 27 => [8, 179], 28 => [8, 178], 16 => [7, 88], 88 => [10, 703],
        113 => [11, 1405], 89 => [12, 2809], 107 => [13, 5617], 90 => [14, 11233],
        42 => [15, 22465], 64 => [16, 44929], 0 => [16, 44928], 81 => [9, 350],
        29 => [8, 174], 118 => [8, 173], 30 => [8, 172], 98 => [8, 171], 12 => [8, 170],
        99 => [7, 84], 117 => [6, 41], 112 => [6, 40], 102 => [9, 319], 68 => [9, 318],
        31 => [8, 158], 100 => [7, 78], 84 => [6, 38], 55 => [6, 37], 17 => [7, 73],
        8 => [7, 72], 9 => [7, 71], 77 => [7, 70], 18 => [7, 69], 65 => [7, 68],
        48 => [6, 33], 116 => [6, 32], 10 => [7, 63], 121 => [8, 125], 78 => [8, 124],
        80 => [7, 61], 69 => [7, 60], 119 => [7, 59], 13 => [8, 117], 79 => [8, 116],
        19 => [7, 57], 67 => [7, 56], 114 => [6, 27], 83 => [6, 26], 115 => [6, 25],
        14 => [6, 24], 122 => [8, 95], 95 => [8, 94], 76 => [7, 46], 24 => [7, 45],
        37 => [7, 44], 50 => [5, 10], 51 => [5, 9], 108 => [6, 17], 22 => [7, 33],
        120 => [8, 65], 66 => [8, 64], 21 => [7, 31], 106 => [7, 30], 47 => [6, 14],
        53 => [5, 6], 49 => [5, 5], 86 => [8, 39], 85 => [8, 38], 23 => [7, 18],
        75 => [7, 17], 20 => [7, 16], 2 => [5, 3], 73 => [8, 23], 43 => [9, 45],
        87 => [9, 44], 70 => [7, 10], 3 => [6, 4], 52 => [5, 1], 54 => [5, 0]
    ];

    // 私有方法 t() 和 mainEncode() 保持不变...
    private static function t(int &$r, int &$o, array $input_tuple, string &$n): void {
        list($shift, $value) = $input_tuple;
        $r = ($r << $shift) | $value;
        $o += $shift;
        while ($o >= 6) {
            $e = ($r >> ($o - 6)) & 63;
            $n .= self::$A[$e];
            $r ^= ($e << ($o - 6));
            $o -= 6;
        }
    }

    private static function mainEncode(string $e): string {
        $n = ""; $r = 0; $o = 0;
        $len_e = strlen($e);
        self::t($r, $o, [6, (7 & $len_e) << 3 | 0], $n);
        self::t($r, $o, [6, 56 & $len_e | 1], $n);

        $length = strlen($e);
        for ($i = 0; $i < $length; $i++) {
            $char = $e[$i];
            $charCode = ord($char);
            if (!isset(self::$w[$charCode])) {
                // Consider throwing an exception for invalid input
                // throw new \InvalidArgumentException("Invalid character for encoding: " . $char);
                return ""; // Or return empty string as per original logic
            }
            self::t($r, $o, self::$w[$charCode], $n);
        }

        self::t($r, $o, self::$w[0], $n);
        if ($o > 0) {
            self::t($r, $o, [6 - $o, 0], $n);
        }
        return $n;
    }

    // 公有方法 encode() 保持不变...
    public static function encode(string $e): string {
        $n = $e;
        foreach (self::$y as $r => $rep) {
            $n = str_replace($rep, chr($r + 1), $n);
        }

        $n_val = 65535;
        $length = strlen($e); // Use original $e length for checksum
        for ($i = 0; $i < $length; $i++) {
            $charCode = ord($e[$i]);
            $n_val = ((($n_val >> 8) | ($n_val << 8))) & 0xFFFF;
            $n_val ^= $charCode;
            $n_val &= 0xFFFF;
            $n_val ^= (($n_val & 0xFF) >> 4);
            $n_val &= 0xFFFF;
            $n_val ^= ($n_val << 12);
            $n_val &= 0xFFFF;
            $n_val ^= ((($n_val & 0xFF) << 5));
            $n_val &= 0xFFFF;
        }
        $n_val &= 0xFFFF;

        // Check if indices exist before accessing self::$A, although $n_val should guarantee valid indices (0-63)
        $idx1 = $n_val >> 12;
        $idx2 = ($n_val >> 6) & 63;
        $idx3 = $n_val & 63;
        // Basic check - can be removed if confident about indices
        if ($idx1 < 0 || $idx1 >= strlen(self::$A) || $idx2 < 0 || $idx2 >= strlen(self::$A) || $idx3 < 0 || $idx3 >= strlen(self::$A)) {
             throw new \RangeException("Checksum calculation resulted in invalid index for alphabet A.");
        }

        $checksum = self::$A[$idx1] . self::$A[$idx2] . self::$A[$idx3];

        return self::mainEncode($n) . $checksum;
    }


    // 辅助函数 getTimezoneOffsetMinutes() 和 isDst() 保持不变...
    private static function getTimezoneOffsetMinutes(\DateTimeInterface $date): int {
        return -($date->getOffset() / 60);
    }

    private static function isDst(\DateTimeInterface $date, int $t1_offset_min, int $t2_offset_min): bool {
         $base_is_dst = abs($t1_offset_min - $t2_offset_min) !== 0;
         return $base_is_dst && self::getTimezoneOffsetMinutes($date) == min($t1_offset_min, $t2_offset_min);
    }


    /**
     * 生成用于编码的原始指纹字符串
     *
     * @param string $timezoneId IANA 时区标识符 (例如 'America/Los_Angeles', 'Asia/Shanghai')
     * @return string 原始指纹字符串
     * @throws \Exception 如果时区标识符无效
     */
    public static function generate(string $timezoneId = 'America/Los_Angeles'): string {
        try {
            $tz = new \DateTimeZone($timezoneId);
        } catch (\Exception $ex) {
            // 重新抛出异常，指明是时区问题
            throw new \InvalidArgumentException("Invalid timezone identifier provided: " . $timezoneId, 0, $ex);
        }

        // 使用传入的时区创建日期对象
        // 注意：年份的选择可能影响历史 DST 规则，Python 用 2005，我们保持一致
        try {
            $date_t1 = new \DateTime('2005-01-15', $tz);
            $date_t2 = new \DateTime('2005-07-15', $tz);
            $currentTime = new \DateTime('now', $tz);
            // Python 用了 2005-06-07 21:33:44.888
            $localeDate = new \DateTime('2005-06-07 21:33:44', $tz); //忽略毫秒，因 PHP format 不直接支持
        } catch (\Exception $ex) {
            // DateTime 创建不太可能失败，除非系统时间有问题，但以防万一
             throw new \RuntimeException("Failed to create DateTime objects: " . $ex->getMessage(), 0, $ex);
        }


        $t1_offset_min = self::getTimezoneOffsetMinutes($date_t1);
        $t2_offset_min = self::getTimezoneOffsetMinutes($date_t2);

        $base_is_dst = abs($t1_offset_min - $t2_offset_min) !== 0;
        $base_is_dst_str = $base_is_dst ? 'true' : 'false';

        $is_dst_now = self::isDst($currentTime, $t1_offset_min, $t2_offset_min);
        $is_dst_now_str = $is_dst_now ? 'true' : 'false';

        $currentOffsetMinutes = self::getTimezoneOffsetMinutes($currentTime);
        $offset_diff_abs = abs($t2_offset_min - $t1_offset_min);
        // 注意：这里计算的是小时偏移量，Python 代码似乎也是这样
        $calculated_offset_hours = -(int)(($currentOffsetMinutes + $offset_diff_abs * ($is_dst_now ? 1: 0)) / 60);

        // PHP format: 'm/d/Y, h:i:s A'
        $localeString = rawurlencode($localeDate->format('m/d/Y, h:i:s'));
        $currentLocaleString = rawurlencode($currentTime->format('m/d/Y, h:i:s'));

        // 毫秒时间戳 (需要 PHP 7.0+)
        $timestampMs = intval(floor($currentTime->format('U.u') * 1000));
        // 如果是 PHP 5.x: $timestampMs = $currentTime->getTimestamp() * 1000;

        $randomInt = random_int(1000, 9999);

        // 组合指纹字符串 (保持和之前一致的结构)
        $fingerprintString = "TF1;020;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;" .
                             $base_is_dst_str . ";" .
                             $is_dst_now_str . ";" .
                             $timestampMs . ";" .
                             $calculated_offset_hours . ";" .
                             $localeString . ";;;;;;;;;;" .
                             $randomInt . ";" .
                             $t1_offset_min . ";" .
                             $t2_offset_min . ";" .
                             $currentLocaleString . ";;;;;;;;;;;;;;;;;;;;;;;;" .
                             "25;;;;;;;;;;;;;;;" .
                             "5.6.1-0;;";

        return $fingerprintString;
    }

    /**
     * 创建最终的编码指纹
     *
     * @param string $timezoneId IANA 时区标识符 (例如 'America/Los_Angeles', 'Asia/Shanghai')
     *                           默认为 'America/Los_Angeles' 以保持原行为。
     * @return string 编码后的指纹字符串
     * @throws \Exception 如果时区标识符无效 (来自 generate 方法)
     */
    public static function createFingerprint(string $timezoneId = 'America/Los_Angeles'): string {
        // 调用 generate 并传入时区
        $generated = self::generate($timezoneId);

        // 调用 encode 进行编码
        return self::encode($generated);
    }
}