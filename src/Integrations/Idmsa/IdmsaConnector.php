<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleConnector;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Resources\AuthenticateResources;

class IdmsaConnector extends AppleConnector
{
    public function __construct(
        readonly protected string $serviceKey,
        readonly protected string $redirectUri
    ) {

    }

    public function defaultHeaderSynchronizes(): array
    {
        return ['X-Apple-ID-Session-Id', 'X-Apple-Auth-Attributes', 'scnt'];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://idmsa.apple.com';
    }

    protected function defaultHeaders(): array
    {
        //POST /appleauth/auth/signin/init HTTP/1.1
        // Accept: application/json, text/javascript, */*; q=0.01
        // Accept-Encoding: gzip, deflate, br, zstd
        // Accept-Language: en,zh-CN;q=0.9,zh;q=0.8
        // Connection: keep-alive
        // Content-Length: 426
        // Content-Type: application/json
        // Cookie: dawsp=1F59A566CE125691AC3D3A54B1C7D56CA23654283E26B807CD1C077E914F169E61F5E82264C373A2155B0FC7C7A20ABC53C34FBBC900B452545F157922C689FB8537B51FCD47D118B56DED45D79C742D46561D194CC56EA63EFA0BBDADA50259C3D3E9329A0C61E9B8F6CC2D4E4A10EC2F9C1AA66A43969C; JSESSIONID=7875EB80EED00BC63A8FE2DE4C09462D; geo=US; dslang=US-EN; site=USA; pldfltcid=ee9467bfe3924218ac3d0b07c17f2820033; pltvcid=e6e8399244a043c8b6781e820d7549e1033; POD=us~en; nn-user-journey=%7B%22value%22%3A%7B%22os%22%3A%22%22%2C%22device%22%3A%22Windows%22%2C%22journey%22%3A%7B%22lastPath%22%3A%22%2F%22%2C%22stitchPath%22%3A%5B%22https%3A%2F%2Fsupport.apple.com%2Fchoose-country-region%2Fitunes%22%2C%22%2Fchoose-country-region%22%2C%22%2F%22%5D%7D%7D%2C%22expiry%22%3A1742358166039%7D; aasp=0552D26A5A52DEBCEDB69B9AE5EF01E8570E1074A1D7E42781B8BC57B1667CF0BC56DE100E98FEC7EC752DA9E5E9FDB024D6984FE9BEF2F3FB54D191A51EC48AE96B4DD02B3AC32A9C110EB892475533DE7451CCD0A8B6D837CCBCB3F3F5727C6BDA1BDB5708BDF049C05082A5132249C3EBFC29C8AAF46E; aa=75D289D3D3CBED722E1DE6A09E340728
        // Host: idmsa.apple.com
        // Origin: https://idmsa.apple.com
        // Referer: https://idmsa.apple.com/
        // Sec-Fetch-Dest: empty
        // Sec-Fetch-Mode: cors
        // Sec-Fetch-Site: same-origin
        // User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36
        // X-Apple-Auth-Attributes: s9e+yaf1Jc2GDdxP/gOHgB66r3R/41CchQYlK7xbHSu0T1NKZuaS2NxKtT/mMQBlsaBJVogZ6nEuYKmbI6ESqEbpy6TAO3OVMRUA2wB/HsXAeRzY0d1bbzIU6cCnHdVdrZjhXaRFwXn3fk2cvmYsS4/DiIo1q1weGmRAqKRJSwFXa/sthBYD+TpeNYILx5VCayEs0PFs1hvbv9Ei2zcOMve2pvuKiSlqZ9GlBM+XHbhDwmQdNesjlv00dwBmLx0o4CUVABOKZVkQFGU=
        // X-Apple-Frame-Id: auth-v3tvmuzy-qjax-wg6a-l41a-1rji6ers
        // X-Apple-I-FD-Client-Info: {"U":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36","L":"en","Z":"GMT+08:00","V":"1.1","F":"Fla44j1e3NlY5BNlY5BSmHACVZXnNA94HTk1xVkd0UfSHolk2dUJKy_Aw7GY5Ly.EKY.6eke4GYZb4vTdIwk6uFY5BNlY5cklY5BqNAE.lTjV.8vP"}
        // X-Apple-OAuth-State: auth-v3tvmuzy-qjax-wg6a-l41a-1rji6ers
        // scnt: AAAA-jA1NTJEMjZBNUE1MkRFQkNFREI2OUI5QUU1RUYwMUU4NTcwRTEwNzRBMUQ3RTQyNzgxQjhCQzU3QjE2NjdDRjBCQzU2REUxMDBFOThGRUM3RUM3NTJEQTlFNUU5RkRCMDI0RDY5ODRGRTlCRUYyRjNGQjU0RDE5MUE1MUVDNDhBRTk2QjRERDAyQjNBQzMyQTlDMTEwRUI4OTI0NzU1MzNERTc0NTFDQ0QwQThCNkQ4MzdDQ0JDQjNGM0Y1NzI3QzZCREExQkRCNTcwOEJE
        return [
            'Accept'                      => 'application/json, text/javascript, */*; q=0.01',
            'Accept-Encoding'               => 'gzip, deflate, br, zstd',
            'Connection'                  => 'Keep-Alive',
            'Host'                        => 'idmsa.apple.com',
            'Origin'                      => $this->resolveBaseUrl(),
            'Referer'                     => $this->resolveBaseUrl(),
            'Sec-Fetch-Site'              => 'same-origin',
            'Sec-Fetch-Mode'              => 'cors',
            'Sec-Fetch-Dest'              => 'empty',
            'User-Agent'                  => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
            'X-Apple-Widget-Key'            => $this->serviceKey,
            'X-Apple-OAuth-Redirect-URI'   => $this->redirectUri,
            'X-Apple-OAuth-Client-Id'      => $this->serviceKey,
            'X-Apple-OAuth-Client-Type'    => 'firstPartyAuth',
            'X-Requested-With'            => 'XMLHttpRequest',
            'X-Apple-OAuth-Response-Mode' => 'web_message',
            'X-Apple-OAuth-Response-Type' => 'code',
            'X-APPLE-HC'                  => '1:12:20240626165907:82794b5d498b7d7dc29740b23971ded5::4824',
            'X-Apple-Domain-Id'           => '1',
            
            'Priority'                    => 'u=1, i',
            'Sec-Ch-Ua'                   => "Chromium;v=124, Google Chrome;v=124",
            'Sec-Ch-Ua-Mobile'            => '?0',
            'Sec-Ch-Ua-Platform'          => 'Windows',
        ];
    }

    public function getAuthenticateResources(): AuthenticateResources
    {
        return new AuthenticateResources($this);
    }
}
