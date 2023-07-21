<?php

declare(strict_types=1);

namespace DotTest\Helpers;

use Dot\Helpers\Route\RouteHelper;
use Laminas\Diactoros\Uri;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UriInterface;

class RouteHelperTest extends TestCase
{
    private RouteHelper $routeHelper;

    /**
     * @throws Exception
     */
    protected function setup(): void
    {
        $this->routeHelper = new RouteHelper(
            $this->createMock(UrlHelper::class),
            $this->createMock(ServerUrlHelper::class)
        );
    }

    public function testGenerateUri(): void
    {
        $specs['route_name']   = 'testDotHelpers';
        $specs['route_params'] = ['test'];
        $specs['query_params'] = ['test'];
        $specs['fragment_id']  = 'test';
        $specs['options']      = ['test'];

        $generateUri = $this->routeHelper->generateUri($specs);
        $this->assertInstanceOf(UriInterface::class, $generateUri);
        $generateUri = $this->routeHelper->generateUri($specs, true);
        $this->assertInstanceOf(UriInterface::class, $generateUri);
    }

    /**
     * @throws Exception
     */
    public function testUriEquals()
    {
        $uri1 = $this->createMock(UriInterface::class);
        $uri2 = $this->createMock(UriInterface::class);

        $uri1->method('getScheme')->willReturn('test');
        $uri2->method('getScheme')->willReturn('test');

        $uri1->method('getHost')->willReturn('test');
        $uri2->method('getHost')->willReturn('test');

        $uri1->method('getPath')->willReturn('test');
        $uri2->method('getPath')->willReturn('test');

        $uri1->method('getPort')->willReturn(1);
        $uri2->method('getPort')->willReturn(1);

        $generateUri = $this->routeHelper->uriEquals($uri1, $uri2);
        $this->assertTrue($generateUri);
    }

    public function testAppendQueryParam()
    {
        $uri    = new Uri();
        $newUri = $this->routeHelper->appendQueryParam($uri, 'test', 'testing');
        $query  = $newUri->getQuery();

        $this->assertInstanceOf(UriInterface::class, $newUri);
        $this->assertEquals('test=testing', $query);
    }
}
