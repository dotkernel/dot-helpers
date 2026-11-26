<?php

declare(strict_types=1);

namespace Dot\Helpers;

use Dot\Helpers\Factory\RouteHelperFactory;
use Dot\Helpers\Route\RouteHelper;

class ConfigProvider
{
    /**
     * @return array{dependencies: array{factories: array<class-string, class-string>}}
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    /**
     * @return array{factories: array<class-string, class-string>}
     */
    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                RouteHelper::class => RouteHelperFactory::class,
            ],
        ];
    }
}
