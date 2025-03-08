<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage;

use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\Token\Token;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class TokenRequest extends Request
{
    protected Method $method = Method::GET;


    public function createDtoFromResponse(Response $response): Token
    {
        return Token::from($response->json());
    }

    public function resolveEndpoint(): string
    {
        return '/account/manage/gs/ws/token';
    }
}
