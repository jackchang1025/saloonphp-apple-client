<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Resources;

use Saloon\Exceptions\InvalidPoolItemException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Response\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\Locales\Locales as LocalesRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\Locales\JsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Request\System\MainJs;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class LocalesResources extends BaseResource
{
    /**
     * @param string $version
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function mainJs(string $version): Response
    {
        return $this->getConnector()->send(new MainJs($version));
    }

    /**
     * @param string $clientBuildNumber
     * @param string $clientMasteringNumber
     * @param string $clientId
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function locales(string $clientBuildNumber, string $clientMasteringNumber, string $clientId): Response
    {
        return $this->getConnector()
            ->send(new LocalesRequest($clientBuildNumber, $clientMasteringNumber, $clientId));
    }

    /**
     * @throws InvalidPoolItemException
     */
    public function localesPoolJS(array $jsUrls, string $referer, int $concurrency = 10): mixed
    {
        $responses = [];
        foreach ($jsUrls as $jsUrl) {
            $responses[] = new JsRequest($jsUrl, $referer);
        }

        return $this->getConnector()
        ->pool(
            requests: $responses,
            concurrency: $concurrency,
            responseHandler: function (Response $response) {
                return $response->body();
            },
            exceptionHandler: function (FatalRequestException|RequestException $exception) {
                throw $exception;
            },
        )->send()->wait();
    }
}
