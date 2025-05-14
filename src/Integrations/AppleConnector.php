<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations;

use GuzzleHttp\Cookie\CookieJar;
use Psr\Log\LoggerInterface;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\ServerException;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Request;
use Saloon\Traits\Conditionable;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;
use Weijiajia\SaloonphpAppleClient\Contracts\AppleId;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecCh;
use Weijiajia\SaloonphpAppleClient\Plugins\HasSecFetch;
use Weijiajia\SaloonphpAppleClient\Response\Response;
use Weijiajia\SaloonphpCookiePlugin\Contracts\CookieJarInterface;
use Weijiajia\SaloonphpCookiePlugin\HasCookie;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronize;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronizeDriver;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\HasHeaderSynchronize;
use Weijiajia\SaloonphpHttpProxyPlugin\Contracts\ProxyManagerInterface;
use Weijiajia\SaloonphpHttpProxyPlugin\HasProxy;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Weijiajia\SaloonphpLogsPlugin\Contracts\HasLoggerInterface;
use Weijiajia\SaloonphpLogsPlugin\HasLogger;

abstract class AppleConnector extends Connector implements CookieJarInterface, HeaderSynchronize, ProxyManagerInterface, HasLoggerInterface
{
    use HasTimeout;
    use AlwaysThrowOnErrors;
    use HasLogger;
    use HasProxy;
    use HasCookie;
    use HasHeaderSynchronize;
    use HasSecCh;
    use HasSecFetch;
    use Conditionable;

    public ?int $tries = 3;

    public function __construct(protected AppleId $appleId)
    {
        $this->when($this->appleId->debug(), fn(AppleConnector $connector) => $connector->debug())
            ->when(
                $this->appleId->headerSynchronizeDriver(),
                fn(
                    AppleConnector $connector,
                    HeaderSynchronizeDriver $headerSynchronize
                ) => $connector->withHeaderSynchronizeDriver($headerSynchronize)
            )
            ->when(
                $this->appleId->cookieJar(),
                fn(AppleConnector $connector, CookieJar $cookieJar) => $connector->withCookies($cookieJar)
            )
            ->when(
                $this->appleId->logger(),
                fn(AppleConnector $connector, LoggerInterface $logger) => $connector->withLogger($logger)
            )
            ->when(
                $this->appleId->proxySplQueue(),
                fn(AppleConnector $connector, ProxySplQueue $proxySplQueue) => $connector->withProxyQueue(
                    $proxySplQueue
                )
            )
            ->withProxyEnabled(true)
            ->withForceProxy(true)
            ->middleware()
            ->merge($this->appleId->middleware());

    }

    public function appleId(): AppleId
    {
        return $this->appleId;
    }

    public function resolveResponseClass(): string
    {
        return Response::class;
    }

    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        return $exception instanceof FatalRequestException || $exception instanceof ServerException;
    }

    /**
     * @param Request $request
     * @param MockClient|null $mockClient
     * @param callable|null $handleRetry
     *
     * @return Response
     * @throws RequestException
     *
     * @throws FatalRequestException
     */
    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
       try{

            /**
             * @var Response $response
             */
            $response = parent::send($request, $mockClient, $handleRetry);

            return $response;

       }catch(\Saloon\Exceptions\Request\Statuses\UnauthorizedException $e){

            $this->appleId->cookieJar()->clear();
            throw $e;
       }

        
    }
}
