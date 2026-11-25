<?php

declare(strict_types=1);

namespace DotTest\Helpers\TestData;

use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;

use function sprintf;

class ServiceNotFoundException extends RuntimeException implements NotFoundExceptionInterface
{
    public function __construct(string $id)
    {
        parent::__construct(sprintf('Service "%s" is not registered.', $id));
    }
}
