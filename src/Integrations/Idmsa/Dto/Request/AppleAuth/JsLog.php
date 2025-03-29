<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Request\AppleAuth;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class JsLog extends Data 
{
    // {
    //     "type": "INFO",
    //     "title": "sk",
    //     "message": "APPLE ID : sk-1-1-d39ba9916b7251055b22c7f910e2ea796ee65e98b2ddecea8f5dde8d9d1a815d",
    //     "iframeId": "2f118abd-6c5a-43c8-863e-40d9a55a00ea",
    //     "details": "{\"pageVisibilityState\":\"visible\"}"
    // }
    public function __construct(
        public string $type,
        public string $title,
        public string $message,
        public string $iframeId,
        public string $details,
    ) {
    }
}