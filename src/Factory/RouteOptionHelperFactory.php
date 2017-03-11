<?php
/**
 * @see https://github.com/dotkernel/dot-helpers/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-helpers/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Helpers\Factory;

use Dot\Helpers\Route\RouteOptionHelper;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Helper\UrlHelper;

/**
 * Class RouteOptionHelperFactory
 * @package Dot\Helpers\Factory
 */
class RouteOptionHelperFactory
{
    /**
     * @param ContainerInterface $container
     * @return RouteOptionHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        $urlHelper = $container->get(UrlHelper::class);
        $serverUrlHelper = $container->get(ServerUrlHelper::class);

        return new RouteOptionHelper($urlHelper, $serverUrlHelper);
    }
}
