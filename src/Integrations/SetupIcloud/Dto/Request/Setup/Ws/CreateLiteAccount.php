<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\Setup\Ws;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class CreateLiteAccount extends Data
{
    // {
    //     "createPayload": {
    //         "accountWasCreated": true,
    //         "session": "AUYQKJb3F9h5P5RYyzoUyhXrfqcNPG4KrwKC8hkkWNvXczehOQEp9kA0MkKJYTXt6ITjF+vLp8RpXon6lzXncsabyggseZCyMd22AfdRRW0Kw+Y8v8UJUSmV9iYERcByG8mwQuaNbqGSL3Edpv9V0RE/TzhJ+nWBS4lFKtPpwezVdypDTpLRqJCeNoBUEjbRsa+2zuqcAEemtPIpXCJFTQF3sZ7GipJ3yQ4joq8vSjXUHzI1sk21UqteFztZtbjAr4WXILFvIeFwPKrJZcM8uSlLuZ8UXPXXaXu6G8vsA/cyzGkG+VW1NMbVDIEsNjldkySp3cCU2wWS58onu3AI1Ywx2KhT7kd2/1GgCdLgvcvhztbZE2eyB8km2eOidrk6cAaifCE3jsnK3e1kVEdDGJyTUJ2KroFft/gEhEV/PaKBz9xnyzFJ7GyGd3wub3yTUMISBlwYDLvParif7yZ24X6Y4LNioOrOW0VCEPnjftRZwH0p6MSxLKAVd5CMeY0r3mLxnc5lIgkY3JNMArSoQyfg40qhiSPCFXhrm77WX/p1bMbYDMwRIT+Z44Oec70BkDO2ZX2nbpGXZ6gcoH9fEIM+lG/wcJcCgC3yvVF/kCRK2PG+K6J3xYXUPwHwaB9wcnxPJgkyzOXfbNGVGKN4murmBdl42TeeWt6m1hHwFp4/uFtdh4YLiealacY4N9wQ6rEdeJtiZye3s5ypEq2VQDkrCUaFmp/I6agbWG6LWoNkzy2WmihO3CWxsEZ12r96Gn02z5FoV/K4LZvnVhfylnbgABfBNAX0/mg=",
    //         "account": {
    //             "name": "wwndpcsrik3871@hotmail.com",
    //             "person": {
    //                 "name": {
    //                     "middleNameRequired": false,
    //                     "firstName": "jack",
    //                     "lastName": "leo"
    //                 }
    //             }
    //         }
    //     },
    //     "acceptedICloudTerms": "610701"
    // }
    public function __construct(
        public array $createPayload,
        public string $acceptedICloudTerms,
    ) {}
}
