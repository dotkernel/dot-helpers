<?php

declare(strict_types=1);

namespace DotTest\Helpers\TestData;

use Psr\Container\ContainerInterface;

use function array_key_exists;

class Container implements ContainerInterface
{
    /**
     * @param array<string, mixed> $services
     */
    public function __construct(private array $services = [])
    {
    }

    public function get(string $id): mixed
    {
        if (! array_key_exists($id, $this->services)) {
            throw new ServiceNotFoundException($id);
        }

        return $this->services[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}
