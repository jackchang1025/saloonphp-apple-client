<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Response;

use Illuminate\Support\Collection;
use Weijiajia\SaloonphpAppleClient\ServiceError\ErrorType;
use Weijiajia\SaloonphpAppleClient\ServiceError\ServiceError;

trait HasServiceError
{
    /**
     * @return Collection<int,ServiceError>
     */
    public function getServiceErrors(): Collection
    {
        return collect(ErrorType::cases())
            ->flatMap(fn (ErrorType $errorType) => $this->getErrorsForType($errorType))
            ->filter()
        ;
    }

    /**
     * Get the first service error.
     */
    public function getFirstServiceError(): ?ServiceError
    {
        return $this->getServiceErrors()->first();
    }

    /**
     * Get authentication service errors.
     *
     * @return Collection<int,ServiceError>
     *
     * @throws \JsonException
     */
    public function getAuthServiceErrors(): Collection
    {
        $errors = data_get($this->authorizeSing(), 'direct.twoSV.phoneNumberVerification.serviceErrors', []);

        return collect($errors)
            ->map(fn (array $serviceError) => new ServiceError($serviceError))
        ;
    }

    /**
     * Get the first authentication service error.
     *
     * @throws \JsonException
     */
    public function getFirstAuthServiceError(): ?ServiceError
    {
        return $this->getAuthServiceErrors()->first();
    }

    /**
     * @throws \JsonException
     */
    private function getErrorsForType(ErrorType $errorType): array
    {
        $data = $this->json($errorType->value);

        return empty($data) ? [] : $errorType->getServiceErrors($data);
    }
}
