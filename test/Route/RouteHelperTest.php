<?php

declare(strict_types=1);

namespace DotTest\Helpers\Route;

use Dot\Helpers\Route\RouteHelper;
use DotTest\Helpers\TestData\Router;
use Laminas\Diactoros\Uri;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function parse_str;

class RouteHelperTest extends TestCase
{
    private RouteHelper $routeHelper;

    protected function setUp(): void
    {
        $serverUrlHelper = new ServerUrlHelper();
        $serverUrlHelper->setUri(new Uri('https://example.com:8443/base'));

        $this->routeHelper = new RouteHelper(
            new UrlHelper(new Router(['user' => '/user/{id}'])),
            $serverUrlHelper
        );
    }

    public function testGenerateUriReturnsRelativeUri(): void
    {
        $uri = $this->routeHelper->generateUri([
            'route_name'   => 'user',
            'route_params' => ['id' => '5'],
            'query_params' => ['a' => 'b c'],
            'fragment_id'  => 'top',
        ]);

        $this->assertSame('/user/5?a=b+c#top', (string) $uri);
    }

    public function testGenerateUriReturnsAbsoluteUri(): void
    {
        $uri = $this->routeHelper->generateUri(['route_name' => 'user', 'route_params' => ['id' => '5']], true);

        $this->assertSame('https://example.com:8443/user/5', (string) $uri);
    }

    /**
     * @return iterable<string, array{string, string, bool}>
     */
    public static function uriEqualsProvider(): iterable
    {
        yield 'same uri'             => ['https://e.com/p', 'https://e.com/p', true];
        yield 'query is ignored'     => ['https://e.com/p?a=1', 'https://e.com/p?a=2', true];
        yield 'fragment is ignored'  => ['https://e.com/p#a', 'https://e.com/p#b', true];
        yield 'default port'         => ['https://e.com:443/p', 'https://e.com/p', true];
        yield 'other scheme'         => ['http://e.com/p', 'https://e.com/p', false];
        yield 'other host'           => ['https://a.com/p', 'https://e.com/p', false];
        yield 'other port'           => ['https://e.com:8443/p', 'https://e.com/p', false];
        yield 'other path'           => ['https://e.com/a', 'https://e.com/p', false];
        yield 'trailing slash'       => ['https://e.com/p/', 'https://e.com/p', false];
    }

    #[DataProvider('uriEqualsProvider')]
    public function testUriEquals(string $uri1, string $uri2, bool $expected): void
    {
        $this->assertSame($expected, $this->routeHelper->uriEquals(new Uri($uri1), new Uri($uri2)));
    }

    /**
     * @return iterable<string, array{string, string, string, string}>
     */
    public static function appendQueryParamProvider(): iterable
    {
        yield 'empty query'           => ['/p', 'test', 'testing', 'test=testing'];
        yield 'space is encoded once' => ['/p', 'q', 'a b', 'q=a%20b'];
        yield 'reserved characters'   => ['/p', 'q', 'x&y=z', 'q=x%26y%3Dz'];
        yield 'utf-8'                 => ['/p', 'q', 'ä', 'q=%C3%A4'];
        yield 'dots in keys are kept' => ['/p?a.b=1&c%20d=2', 'q', 'v', 'a.b=1&c%20d=2&q=v'];
        yield 'query "0" is kept'     => ['/p?0', 'q', 'v', '0&q=v'];
        yield 'same name is replaced' => ['/p?q=old&r=1', 'q', 'new', 'q=new&r=1'];
        yield 'form-encoded name'     => ['/p?my+key=old&q=1', 'my key', 'new', 'my%20key=new&q=1'];
        yield 'duplicates removed'    => ['/p?q=1&r=2&q=3', 'q', 'v', 'q=v&r=2'];
    }

    #[DataProvider('appendQueryParamProvider')]
    public function testAppendQueryParam(string $uri, string $name, string $value, string $expected): void
    {
        $this->assertSame($expected, $this->routeHelper->appendQueryParam(new Uri($uri), $name, $value)->getQuery());
    }

    public function testAppendQueryParamValueDecodesToOriginal(): void
    {
        $query = $this->routeHelper->appendQueryParam(new Uri('/p'), 'q', 'a b&c')->getQuery();
        parse_str($query, $params);

        $this->assertSame(['q' => 'a b&c'], $params);
    }

    public function testSettersReplaceHelpers(): void
    {
        $urlHelper       = new UrlHelper(new Router([]));
        $serverUrlHelper = new ServerUrlHelper();

        $this->routeHelper->setUrlHelper($urlHelper);
        $this->routeHelper->setServerUrlHelper($serverUrlHelper);

        $this->assertSame($urlHelper, $this->routeHelper->getUrlHelper());
        $this->assertSame($serverUrlHelper, $this->routeHelper->getServerUrlHelper());
    }
}
