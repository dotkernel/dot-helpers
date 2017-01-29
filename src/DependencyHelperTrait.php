<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 12/6/2016
 * Time: 7:39 PM
 */

declare(strict_types = 1);

namespace Dot\Helpers;

use Interop\Container\ContainerInterface;

/**
 * Trait DependencyHelperTrait
 * @package Dot\Helpers
 */
trait DependencyHelperTrait
{
    public function getDependencyObject(ContainerInterface $container, string $name)
    {
        $dependency = $name;
        if ($container->has($dependency)) {
            $dependency = $container->get($dependency);
        }

        if (is_string($dependency) && class_exists($dependency)) {
            $dependency = new $dependency;
        }

        return $dependency;
    }
}
