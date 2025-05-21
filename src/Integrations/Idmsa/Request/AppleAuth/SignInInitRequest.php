<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Request\AppleAuth;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\FlysystemDriver;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Weijiajia\SaloonphpAppleClient\Integrations\Idmsa\Dto\Response\SignIn\SignInInit;
use Weijiajia\SaloonphpAppleClient\Integrations\Request;

class SignInInitRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected string $a, protected string $account) {}

    // public function resolveCacheDriver(): Driver
    // {
    //     // This example uses the "AwsS3V3Adapter" driver
    //     // that is provided by Flysystem.

    //     return new FlysystemDriver(
    //         new Filesystem(new LocalFilesystemAdapter(storage_path('app/public/cache')))
    //     );
    // }

    // public function cacheExpiryInSeconds(): int
    // {
    //     return 3600; // One Hour
    // }

    public function createDtoFromResponse(Response $response): SignInInit
    {
        return SignInInit::from($response->json());
    }

    public function defaultBody(): array
    {
        return [
            'a' => $this->a,
            'accountName' => $this->account,
            'protocols' => ['s2k', 's2k_fo'],
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/appleauth/auth/signin/init';
    }
}
