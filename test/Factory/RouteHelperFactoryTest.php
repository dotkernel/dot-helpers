<?php

declare(strict_types=1);

namespace DotTest\Helpers\Factory;

use Dot\Helpers\Exception\RuntimeException;
use Dot\Helpers\Factory\RouteHelperFactory;
use DotTest\Helpers\TestData\Container;
use DotTest\Helpers\TestData\Router;
use DotTest\Helpers\TestData\ServiceNotFoundException;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use PHPUnit\Framework\TestCase;
use stdClass;

class RouteHelperFactoryTest extends TestCase
{
    public function testCreatesRouteHelperWithServicesFromContainer(): void
    {
        $urlHelper       = new UrlHelper(new Router([]));
        $serverUrlHelper = new ServerUrlHelper();

        $routeHelper = (new RouteHelperFactory())(new Container([
            UrlHelper::class       => $urlHelper,
            ServerUrlHelper::class => $serverUrlHelper,
        ]));

        $this->assertSame($urlHelper, $routeHelper->getUrlHelper());
        $this->assertSame($serverUrlHelper, $routeHelper->getServerUrlHelper());
    }

    public function testThrowsWhenUrlHelperHasWrongType(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'Service "Mezzio\Helper\UrlHelper" must be an instance of "Mezzio\Helper\UrlHelper", "null" given.'
        );

        (new RouteHelperFactory())(new Container([
            UrlHelper::class       => null,
            ServerUrlHelper::class => new ServerUrlHelper(),
        ]));
    }

    public function testThrowsWhenServerUrlHelperHasWrongType(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('"stdClass" given.');

        (new RouteHelperFactory())(new Container([
            UrlHelper::class       => new UrlHelper(new Router([])),
            ServerUrlHelper::class => new stdClass(),
        ]));
    }

    public function testContainerExceptionIsNotCaught(): void
    {
        $this->expectException(ServiceNotFoundException::class);

        (new RouteHelperFactory())(new Container());
    }
}
