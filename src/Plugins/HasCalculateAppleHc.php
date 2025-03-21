<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;
use Weijiajia\SaloonphpAppleClient\Contracts\CalculateAppleHc;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronize;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\HeaderSynchronizeException;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\HeaderSynchronizeDriver;
use DateTime;
use DateTimeZone;

trait HasCalculateAppleHc
{
    public function date(): string
    {
        $dateTime = new DateTime('now', new DateTimeZone('UTC'));
        return $dateTime->format('YmdHis');
    }

    public function version(): int
    {
        return 1;
    }

    public function bootHasCalculateAppleHc(PendingRequest $pendingRequest): void
    {

        $request = $pendingRequest->getRequest();
        $connector = $pendingRequest->getConnector();

        if (!$connector instanceof CalculateAppleHc && !$request instanceof CalculateAppleHc) {
            throw new \Exception('connector or request must implement '.CalculateAppleHc::class);
        }


        if (! $request instanceof HeaderSynchronize && ! $connector instanceof HeaderSynchronize) {
            throw new HeaderSynchronizeException(sprintf('Your connector or request must implement %s to use the HasCaching plugin', HeaderSynchronize::class));
        }

        /**
         * @var HeaderSynchronizeDriver
         */
        $headerSynchronizeDriver = $request instanceof HeaderSynchronize
           ? $request->resolveHeaderSynchronizeDriver()
           : $connector->resolveHeaderSynchronizeDriver();


        $hcBits      = $headerSynchronizeDriver->get('X-Apple-HC-Bits');
        $hcChallenge = $headerSynchronizeDriver->get('X-Apple-HC-Challenge');
        if(!$hcBits || !$hcChallenge){
            throw new \InvalidArgumentException('X-Apple-HC-Bits or X-Apple-HC-Challenge not found');
        }

        $calculateAppleHc = $request instanceof CalculateAppleHc ? $request : $connector;
        $version = $calculateAppleHc->version();
        $date = $calculateAppleHc->date($pendingRequest->headers()->get('X-Apple-I-Timezone'));

        $hc = self::calculate_hc($version, $hcBits, $date, $hcChallenge);

        $pendingRequest->headers()->add('X-Apple-Hc', $hc);
    }

    
    /**
     * 计算满足指定位数前导零的哈希挑战
     *
     * @param int $version 版本号
     * @param int $bits 需要满足的前导零位数
     * @param string $date 日期字符串
     * @param string $challenge 挑战字符串
     * @return string|null 满足条件的哈希挑战字符串
     */
    public static function calculate_hc(int $version, int $bits, string $date, string $challenge): ?string
    {
        $counter = 0;

        while (true) {
            // 构建挑战字符串
            $hc = implode(":", [$version, $bits, $date, $challenge, ":" . $counter]);

            // 计算 SHA-1 哈希值 (使用 raw_output=true 获取二进制形式)
            $hashed_hc = sha1($hc, true);

            // 将二进制转换为位字符串
            $binary_hc = '';
            for ($i = 0, $iMax = strlen($hashed_hc); $i < $iMax; $i++) {
                // 将每个字节转换为8位二进制表示，并确保前导零被保留
                $binary_hc .= str_pad(decbin(ord($hashed_hc[$i])), 8, '0', STR_PAD_LEFT);
            }

            // 检查前 $bits 位是否全为零
            if (substr($binary_hc, 0, $bits) === str_repeat('0', $bits)) {
                return $hc;
            }

            $counter++;
        }
    }
}