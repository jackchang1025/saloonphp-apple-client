<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Buy\Dto;

use Spatie\LaravelData\Data;

class AddPaymentInfos extends Data
{
    /**
     * "paymentMethodType": "CreditCard",
     * "billingFirstName": "chang",
     * "billingLastName": "jack",
     * "addressOfficialLineFirst": "szs",
     * "addressOfficialLineSecond": "szs",
     * "addressOfficialCity": "bear",
     * "addressOfficialStateProvince": "DE",
     * "addressOfficialPostalCode": "19701",
     * "addressOfficialCountryCode": "USA",
     * "phoneOfficeAreaCode": "224",
     * "phoneOfficeNumber": "4751018",
     * "creditCardNumber": "5567356147933030",
     * "creditCardExpirationMonth": "12",
     * "creditCardExpirationYear": "2027",
     * "creditVerificationNumber": "061",
     * "creditCardType": "MasterCard".
     */
    public function __construct(
        public string $paymentMethodType,
        public string $billingFirstName,
        public string $billingLastName,
        public string $addressOfficialLineFirst,
        public string $addressOfficialLineSecond,
        public string $addressOfficialCity,
        public string $addressOfficialStateProvince,
        public string $addressOfficialPostalCode,
        public string $addressOfficialCountryCode,
        public string $phoneOfficeAreaCode,
        public string $phoneOfficeNumber,
        public string $creditCardNumber,
        public string $creditCardExpirationMonth,
        public string $creditCardExpirationYear,
        public string $creditVerificationNumber,
    ) {}
}
