<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations;

use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;
use Weijiajia\SaloonphpLogsPlugin\HasLogger;
use Weijiajia\SaloonphpHttpProxyPlugin\HasProxy;
use Weijiajia\SaloonphpCookiePlugin\HasCookie;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\HasHeaderSynchronize;
use Weijiajia\SaloonphpCookiePlugin\Contracts\CookieJarInterface;
use Weijiajia\SaloonphpHeaderSynchronizePlugin\Contracts\HeaderSynchronize;
use Weijiajia\SaloonphpHttpProxyPlugin\Contracts\ProxyManagerInterface;
use Weijiajia\SaloonphpAppleClient\Response\Response;
use Saloon\Http\Request;


abstract class AppleConnector extends Connector implements CookieJarInterface, HeaderSynchronize,ProxyManagerInterface
{
    use HasTimeout;
    use AlwaysThrowOnErrors;
    use HasLogger;
    use HasProxy;
    use HasCookie;
    use HasHeaderSynchronize;

    public function resolveResponseClass(): string
    {
        return Response::class;
    }

    /**
     * @param Request         $request
     * @param MockClient|null $mockClient
     * @param callable|null   $handleRetry
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     *
     * @return Response
     */
    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        /**
         * @var Response $response
         */
        $response = parent::send($request, $mockClient, $handleRetry);

        return $response;
    }
}
