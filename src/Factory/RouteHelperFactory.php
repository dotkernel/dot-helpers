<?php

declare(strict_types=1);

namespace Dot\Helpers\Factory;

use Dot\Helpers\Route\RouteHelper;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class RouteHelperFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): RouteHelper
    {
        $urlHelper       = $container->get(UrlHelper::class);
        $serverUrlHelper = $container->get(ServerUrlHelper::class);

        return new RouteHelper($urlHelper, $serverUrlHelper);
    }
}
