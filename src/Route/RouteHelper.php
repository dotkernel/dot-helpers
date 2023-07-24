<?php

declare(strict_types=1);

namespace Dot\Helpers\Route;

use Laminas\Diactoros\Uri;
use Mezzio\Helper\ServerUrlHelper;
use Mezzio\Helper\UrlHelper;
use Psr\Http\Message\UriInterface;

use function array_merge;
use function http_build_query;
use function parse_str;
use function urlencode;

class RouteHelper
{
    protected UrlHelper $urlHelper;

    protected ServerUrlHelper $serverUrlHelper;

    public function __construct(UrlHelper $urlHelper, ServerUrlHelper $serverUrlHelper)
    {
        $this->urlHelper       = $urlHelper;
        $this->serverUrlHelper = $serverUrlHelper;
    }

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

    public function uriEquals(UriInterface $uri1, UriInterface $uri2): bool
    {
        return $uri1->getScheme() === $uri2->getScheme()
            && $uri1->getHost() === $uri2->getHost()
            && $uri1->getPath() === $uri2->getPath()
            && $uri1->getPort() === $uri2->getPort();
    }

    public function appendQueryParam(UriInterface $uri, string $name, string $value): UriInterface
    {
        $query = $uri->getQuery();
        $arr   = [];

        if (! empty($query)) {
            parse_str($query, $arr);
        }

        $query = http_build_query(
            array_merge($arr, [$name => urlencode($value)])
        );

        $uri = $uri->withQuery($query);

        return $uri;
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
