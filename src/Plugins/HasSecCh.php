<?php

namespace Weijiajia\SaloonphpAppleClient\Plugins;

use Saloon\Http\PendingRequest;
use Weijiajia\SaloonphpAppleClient\Exception\SecChHeadersException;
use Weijiajia\SaloonphpAppleClient\Helpers\SecChHeadersService;

trait HasSecCh
{
    public function bootHasSecCh(PendingRequest $pendingRequest): void
    {
        $pendingRequest->middleware()->onRequest(function (PendingRequest $pendingRequest) {
            $headers = $pendingRequest->headers();
            // 获取请求的 User-Agent
            $userAgent = $headers->get('User-Agent');
            if (empty($userAgent)) {
                return;
            }

            try {
                $secChService = new SecChHeadersService($userAgent);

                if (!$headers->get('sec-ch-ua')) {
                    $headers->add('sec-ch-ua', $secChService->generateSecChUa());
                }

                if (!$headers->get('sec-ch-ua-mobile')) {
                    $headers->add('sec-ch-ua-mobile', $secChService->generateSecChUaMobile());
                }

                if (!$headers->get('sec-ch-ua-platform')) {
                    $headers->add('sec-ch-ua-platform', $secChService->generateSecChUaPlatform());
                }
            } catch (SecChHeadersException $e) {
                return;
            }
        });
    }
}
