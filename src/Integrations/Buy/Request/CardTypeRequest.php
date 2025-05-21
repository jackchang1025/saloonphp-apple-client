<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy\Request;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class CardTypeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        public string $ccNumber,
        public string $iso3CountryCode,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/account/card/type';
    }

    public function defaultBody(): array
    {
        return [
            'ccNumber' => $this->ccNumber,
            'iso3CountryCode' => $this->iso3CountryCode,
        ];
    }

    /*
     * {cardType: "4", cardName: "MasterCard", cardCategoriesCsv: "L3,CREDIT,PIN_CAPABLE,FLEET,CORPORATE",…}
     * cardCategoriesCsv
     * :
     * "L3,CREDIT,PIN_CAPABLE,FLEET,CORPORATE"
     * cardName
     * :
     * "MasterCard"
     * cardType
     * :
     * "4"
     * status
     * :
     * 0
     */
}
