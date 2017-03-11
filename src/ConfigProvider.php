<?php
/**
 * @see https://github.com/dotkernel/dot-helpers/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-helpers/blob/master/LICENSE.md MIT License
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
