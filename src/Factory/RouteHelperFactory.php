<?php

declare(strict_types=1);

namespace Dot\Helpers\Factory;

use Dot\Helpers\Exception\RuntimeException;
use Dot\Helpers\Route\RouteHelper;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

use function get_debug_type;

class RouteHelperFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws RuntimeException
     */
    public function __invoke(ContainerInterface $container): RouteHelper
    {
        $urlHelper = $container->get(UrlHelper::class);
        if (! $urlHelper instanceof UrlHelper) {
            throw RuntimeException::invalidService(UrlHelper::class, UrlHelper::class, get_debug_type($urlHelper));
        }

        $serverUrlHelper = $container->get(ServerUrlHelper::class);
        if (! $serverUrlHelper instanceof ServerUrlHelper) {
            throw RuntimeException::invalidService(
                ServerUrlHelper::class,
                ServerUrlHelper::class,
                get_debug_type($serverUrlHelper)
            );
        }

        return new RouteHelper($urlHelper, $serverUrlHelper);
    }
}
