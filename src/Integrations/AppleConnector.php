<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Exceptions\Request\ServerException;
use Saloon\Exceptions\Request\Statuses\UnauthorizedException;
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
use Weijiajia\SaloonphpHeaderSynchronizePlugin\HasHeaderSynchronize;
use Weijiajia\SaloonphpHttpProxyPlugin\Contracts\ProxyManagerInterface;
use Weijiajia\SaloonphpHttpProxyPlugin\HasProxy;
use Weijiajia\SaloonphpLogsPlugin\Contracts\HasLoggerInterface;
use Weijiajia\SaloonphpLogsPlugin\HasLogger;
use Weijiajia\SaloonphpHttpProxyPlugin\ProxySplQueue;
use Saloon\Exceptions\Request\Statuses\ServiceUnavailableException;
use Saloon\Exceptions\Request\Statuses\GatewayTimeoutException;

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

    public ?int $retryInterval = 500;

    public function __construct(protected AppleId $appleId)
    {
        if ($this->appleId->debug()) {
            $this->debug();
        }

        if ($this->appleId->headerSynchronizeDriver()) {
            $this->withHeaderSynchronizeDriver($this->appleId->headerSynchronizeDriver());
        }

        if ($this->appleId->cookieJar()) {
            $this->withCookies($this->appleId->cookieJar());
        }

        if ($this->appleId->logger()) {
            $this->withLogger($this->appleId->logger());
        }

        $this->middleware()->merge($this->appleId->middleware());
    }

    public function getProxyQueue(): ?ProxySplQueue
    {
        return $this->appleId->proxySplQueue();
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
        if ($exception instanceof FatalRequestException || $exception instanceof ServiceUnavailableException || $exception instanceof GatewayTimeoutException) {

            if ($this->appleId->proxySplQueue()) {
                $this->appleId->withProxySplQueue(null);
            }

            return true;
        }

        return false;
    }

    /**
     * @throws RequestException
     * @throws FatalRequestException
     */
    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        try {
            /**
             * @var Response $response
             */
            return parent::send($request, $mockClient, $handleRetry);
        } catch (UnauthorizedException $e) {
            $this->appleId->cookieJar()->clear();

            throw $e;
        }
    }
}
