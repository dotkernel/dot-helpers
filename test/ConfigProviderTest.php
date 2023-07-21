<?php

declare(strict_types=1);

namespace DotTest\Helpers;

use Dot\Helpers\ConfigProvider;
use Dot\Helpers\Route\RouteHelper;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    protected array $config;

    protected function setup(): void
    {
        $this->config = (new ConfigProvider())();
    }

    public function testHasDependencies(): void
    {
        $this->assertArrayHasKey('dependencies', $this->config);
    }

    public function testDependenciesHasFactories(): void
    {
        $this->assertArrayHasKey('factories', $this->config['dependencies']);
        $this->assertArrayHasKey(RouteHelper::class, $this->config['dependencies']['factories']);
    }
}
