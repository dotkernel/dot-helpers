<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
 */

declare(strict_types = 1);

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
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencyConfig(),

            'templates' => [
                'paths' => [
                    'dot-partial' => [__DIR__ . '/../templates/dot-partial'],
                    'dot-form' => [__DIR__ . '/../templates/dot-form'],
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                RouteOptionHelper::class => RouteOptionHelperFactory::class,
            ],
        ];
    }
}
