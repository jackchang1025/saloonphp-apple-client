<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\ServiceError;

class DtoServiceError extends ServiceError
{

    public function getTitle(): ?string
    {
        return $this->data['errorTitle'] ?? null;
    }

    public function getMessage(): ?string
    {
        return $this->data['errorMessage'] ?? null;
    }
}
