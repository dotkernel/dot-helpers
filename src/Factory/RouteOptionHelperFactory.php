<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 9/22/2016
 * Time: 6:59 PM
 */

namespace Dot\Helpers\Factory;


use Dot\Helpers\Route\RouteOptionHelper;
use Interop\Container\ContainerInterface;
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
        return new RouteOptionHelper($urlHelper);
    }
}