<?php

declare(strict_types=1);

namespace Dot\Helpers\Exception;

use function sprintf;

class RuntimeException extends \RuntimeException implements ExceptionInterface
{
    public const MESSAGE_INVALID_SERVICE = 'Service "%s" must be an instance of "%s", "%s" given.';

    public static function invalidService(string $serviceName, string $expected, string $actual): self
    {
        return new self(sprintf(self::MESSAGE_INVALID_SERVICE, $serviceName, $expected, $actual));
    }
}
