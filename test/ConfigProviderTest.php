<?php

declare(strict_types=1);

namespace DotTest\Helpers;

use Dot\Helpers\ConfigProvider;
use Dot\Helpers\Factory\RouteHelperFactory;
use Dot\Helpers\Route\RouteHelper;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    public function testInvokeReturnsDependencyConfig(): void
    {
        $configProvider = new ConfigProvider();

        $this->assertSame(['dependencies' => $configProvider->getDependencyConfig()], $configProvider());
    }

    public function testRouteHelperUsesRouteHelperFactory(): void
    {
        $this->assertSame(
            ['factories' => [RouteHelper::class => RouteHelperFactory::class]],
            (new ConfigProvider())->getDependencyConfig()
        );
    }
}
