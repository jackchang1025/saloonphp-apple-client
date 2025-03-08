<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\ValidatePassword;

use Illuminate\Support\Carbon;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class ValidatePassword extends Data
{

    public function __construct(public bool $hasValidatePassword = false, public ?Carbon $updateAt = null)
    {
        if ($this->updateAt === null) {
            $this->updateAt = now();
        }
    }
}
