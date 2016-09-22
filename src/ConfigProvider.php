<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
 */

namespace Dot\Helpers;


use Dot\Helpers\Factory\RouteOptionHelperFactory;
use Dot\Helpers\Route\RouteOptionHelper;

/**
 * Class ConfigProvider
 * @package Dot\Helpers
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencyConfig()
    {
        return [
            'factories' => [
                RouteOptionHelper::class => RouteOptionHelperFactory::class,
            ],
        ];
    }
}