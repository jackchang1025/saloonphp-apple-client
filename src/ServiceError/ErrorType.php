<?php

namespace Weijiajia\SaloonphpAppleClient\ServiceError;


enum ErrorType:string
{
    case DTO = 'dtoErrorInfo';
    case SERVICE = 'service_errors';
    case VALIDATION = 'validationErrors';
    case GENERIC = 'serviceErrors';

    public function getErrorClass(): string
    {
        return match($this) {
            self::DTO => DtoServiceError::class,
            default => ServiceError::class,
        };
    }

    public function getServiceErrors(array $errors): array
    {
        return match($this) {
            self::DTO => [new DtoServiceError($errors)],
            default => array_map(fn (array $error) => new ServiceError($error), $errors),
        };
    }
}
