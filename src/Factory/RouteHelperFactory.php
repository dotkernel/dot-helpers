<?php

declare(strict_types=1);

namespace Dot\Helpers\Factory;

use Dot\Helpers\Route\RouteHelper;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use Psr\Container\ContainerInterface;

class RouteHelperFactory
{
    /**
     * @return RouteHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        $urlHelper       = $container->get(UrlHelper::class);
        $serverUrlHelper = $container->get(ServerUrlHelper::class);

        return new RouteHelper($urlHelper, $serverUrlHelper);
    }
}
