<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
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
