<?php

declare(strict_types=1);

namespace DotTest\Helpers\TestData;

use Mezzio\Router\Route;
use Mezzio\Router\RouteResult;
use Mezzio\Router\RouterInterface;
use Psr\Http\Message\ServerRequestInterface;

use function strtr;

/**
 * Router that knows one route pattern for each name. It replaces "{name}" with the substitution.
 */
class Router implements RouterInterface
{
    /**
     * @param array<string, string> $patterns
     */
    public function __construct(private array $patterns)
    {
    }

    public function addRoute(Route $route): void
    {
    }

    public function match(ServerRequestInterface $request): RouteResult
    {
        return RouteResult::fromRouteFailure(null);
    }

    /**
     * @param array<string, scalar> $substitutions
     * @param array<array-key, mixed> $options
     */
    public function generateUri(string $name, array $substitutions = [], array $options = []): string
    {
        $replace = [];
        foreach ($substitutions as $key => $value) {
            $replace['{' . $key . '}'] = (string) $value;
        }

        return strtr($this->patterns[$name], $replace);
    }
}
