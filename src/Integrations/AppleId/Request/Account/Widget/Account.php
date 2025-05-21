<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Account\Widget;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Account\Widget\Account as AccountDto;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Weijiajia\SaloonphpLogsPlugin\Contracts\HasLoggerInterface;
use Weijiajia\SaloonphpLogsPlugin\HasLogger;

class Account extends Request implements HasLoggerInterface
{
    use HasLogger;

    protected Method $method = Method::GET;

    public function __construct(
        public string $widgetKey,
        public string $referer,
        public string $appContext = 'account',
        public string $lv = '0.3.17',
        public string $v = '3',
        public string $roleType = 'Agent',
    ) {}

    public function resolveEndpoint(): string
    {
        return '/widget/account/?roleType='.$this->roleType.'&lv='.$this->lv.'&widgetKey='.$this->widgetKey.'&v='.$this->v.'&appContext='.$this->appContext;
    }

    public function createDtoFromResponse(Response $response): AccountDto
    {
        return AccountDto::from();
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'Referer' => $this->referer,
            'Upgrade-Insecure-Requests' => '1',
            'Sec-Fetch-Dest' => 'iframe',
            'Sec-Fetch-Mode' => 'navigate',
            'Sec-Fetch-Site' => 'cross-site',
            'Sec-Fetch-User' => '?1',
        ];
    }
}
