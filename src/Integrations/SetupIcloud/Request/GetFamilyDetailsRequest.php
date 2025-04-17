<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request;

use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyDetails\FamilyDetails;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class GetFamilyDetailsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/setup/family/getFamilyDetails';
    }

    public function defaultHeaders(): array
    {
        return [
            "accept-language"   => "zh-cn",
            "user-agent"        => "Accounts/113 CFNetwork/711.2.23 Darwin/14.0.0",
            "accept"            => "*/*",
            "connection"        => "keep-alive",
            "x-mme-client-info" => "<iPhone7,1> <iPhone OS;8.1;12B411> <com.apple.AppleAccount/1.0 (com.apple.Accounts/113)>",
            "proxy-connection"  => "keep-alive",
            "x-mme-country"     => "CN",
            "Accept-Encoding"   => "gzip, deflate",
            "Host"              => "setup.icloud.com",
        ];
    }

    /**
     * @param Response $response
     * @return FamilyDetails
     */
    public function createDtoFromResponse(Response $response): FamilyDetails
    {
        return FamilyDetails::from($response->xmlToCollection()->toArray());
    }
}
