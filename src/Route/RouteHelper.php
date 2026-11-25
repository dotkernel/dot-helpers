<?php

declare(strict_types=1);

namespace Dot\Helpers\Route;

use Laminas\Diactoros\Uri;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use Psr\Http\Message\UriInterface;

use function explode;
use function http_build_query;
use function implode;
use function urldecode;

use const PHP_QUERY_RFC3986;

/**
 * @phpstan-type RouteOptions array{
 *     router?: array<array-key, mixed>,
 *     reuse_result_params?: bool,
 *     reuse_query_params?: bool,
 * }
 * @phpstan-type RouteSpecs array{
 *     route_name?: non-empty-string|null,
 *     route_params?: array<string, mixed>,
 *     query_params?: array<string, mixed>,
 *     fragment_id?: string|null,
 *     options?: RouteOptions,
 * }
 */
class RouteHelper
{
    protected UrlHelper $urlHelper;

    protected ServerUrlHelper $serverUrlHelper;

    public function __construct(UrlHelper $urlHelper, ServerUrlHelper $serverUrlHelper)
    {
        $this->urlHelper       = $urlHelper;
        $this->serverUrlHelper = $serverUrlHelper;
    }

    /**
     * @param RouteSpecs $specs
     */
    public function generateUri(array $specs, bool $absolute = false): UriInterface
    {
        $routeName          = $specs['route_name'] ?? null;
        $routeParams        = $specs['route_params'] ?? [];
        $queryParams        = $specs['query_params'] ?? [];
        $fragmentIdentifier = $specs['fragment_id'] ?? null;
        $routeOptions       = $specs['options'] ?? [];

        $uri = $this->urlHelper->generate($routeName, $routeParams, $queryParams, $fragmentIdentifier, $routeOptions);
        if ($absolute) {
            return new Uri($this->serverUrlHelper->generate($uri));
        }

        return new Uri($uri);
    }

    /**
     * Compare scheme, host, port and path. The query, the fragment and the user info are ignored.
     */
    public function uriEquals(UriInterface $uri1, UriInterface $uri2): bool
    {
        return $uri1->getScheme() === $uri2->getScheme()
            && $uri1->getHost() === $uri2->getHost()
            && $uri1->getPath() === $uri2->getPath()
            && $uri1->getPort() === $uri2->getPort();
    }

    /**
     * Add the parameter to the end of the query. If the query has parameters with the same name,
     * replace the first one in its position and remove the others. Other parameters stay unchanged.
     */
    public function appendQueryParam(UriInterface $uri, string $name, string $value): UriInterface
    {
        $param    = http_build_query([$name => $value], '', '&', PHP_QUERY_RFC3986);
        $pairs    = [];
        $replaced = false;
        foreach (explode('&', $uri->getQuery()) as $pair) {
            if ($pair === '') {
                continue;
            }
            if (urldecode(explode('=', $pair, 2)[0]) !== $name) {
                $pairs[] = $pair;
                continue;
            }
            if (! $replaced) {
                $pairs[]  = $param;
                $replaced = true;
            }
        }
        if (! $replaced) {
            $pairs[] = $param;
        }

        return $uri->withQuery(implode('&', $pairs));
    }

    public function getUrlHelper(): UrlHelper
    {
        return $this->urlHelper;
    }

    public function setUrlHelper(UrlHelper $urlHelper): void
    {
        $this->urlHelper = $urlHelper;
    }

    public function getServerUrlHelper(): ServerUrlHelper
    {
        return $this->serverUrlHelper;
    }

    public function setServerUrlHelper(ServerUrlHelper $serverUrlHelper): void
    {
        $this->serverUrlHelper = $serverUrlHelper;
    }
}
