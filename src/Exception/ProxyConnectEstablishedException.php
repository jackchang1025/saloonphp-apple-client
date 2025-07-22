<?php


namespace Weijiajia\SaloonphpAppleClient\Exception;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

/**
 * 当收到 "HTTP/1.1 200 Connection Established" 响应时抛出的异常
 * 这通常表示请求被错误地发送到了代理服务器，而不是目标 API 端点
 */
class ProxyConnectEstablishedException extends RequestException
{    
 
    public static function isProxyConnectResponse(Response $response): bool
    {
        return $response->status() === 200 
            && str_contains(strtolower($response->body()), 'connection established');
    }
} 