<?php
/**
 * @see https://github.com/dotkernel/dot-helpers/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-helpers/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Helpers\Route;

use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Uri;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Helper\UrlHelper;

/**
 * Class RouteOptionHelper
 * @package Dot\Helpers\Route
 */
class RouteHelper
{
    /** @var  UrlHelper */
    protected $urlHelper;

    /** @var  ServerUrlHelper */
    protected $serverUrlHelper;

    /**
     * RouteOptionHelper constructor.
     * @param UrlHelper $urlHelper
     * @param ServerUrlHelper $serverUrlHelper
     */
    public function __construct(UrlHelper $urlHelper, ServerUrlHelper $serverUrlHelper)
    {
        $this->urlHelper = $urlHelper;
        $this->serverUrlHelper = $serverUrlHelper;
    }

    /**
     * @param array $specs
     * @param bool $absolute
     * @return UriInterface
     */
    public function generateUri(array $specs, bool $absolute = false): UriInterface
    {
        $routeName = $specs['route_name'] ?? null;
        $routeParams = $specs['route_params'] ?? [];
        $queryParams = $specs['query_params'] ?? [];
        $fragmentIdentifier = $specs['fragment_id'] ?? null;
        $routeOptions = $specs['options'] ?? [];

        $uri = $this->urlHelper->generate($routeName, $routeParams, $queryParams, $fragmentIdentifier, $routeOptions);
        if ($absolute) {
            return new Uri($this->serverUrlHelper->generate($uri));
        }

        return new Uri($uri);
    }

    /**
     * @param UriInterface $uri1
     * @param UriInterface $uri2
     * @return bool
     */
    public function uriEquals(UriInterface $uri1, UriInterface $uri2): bool
    {
        return $uri1->getScheme() === $uri2->getScheme()
            && $uri1->getHost() === $uri2->getHost()
            && $uri1->getPath() === $uri2->getPath()
            && $uri1->getPort() === $uri2->getPort();
    }

    /**
     * @param UriInterface $uri
     * @param string $name
     * @param $value
     * @return UriInterface
     */
    public function appendQueryParam(UriInterface $uri, string $name, $value): UriInterface
    {
        $query = $uri->getQuery();
        $arr = [];
        if (!empty($query)) {
            parse_str($query, $arr);
        }

        $query = http_build_query(
            array_merge($arr, [$name => urlencode($value)])
        );

        $uri = $uri->withQuery($query);
        return $uri;
    }

    /**
     * @return UrlHelper
     */
    public function getUrlHelper(): UrlHelper
    {
        return $this->urlHelper;
    }

    /**
     * @param UrlHelper $urlHelper
     */
    public function setUrlHelper(UrlHelper $urlHelper)
    {
        $this->urlHelper = $urlHelper;
    }

    /**
     * @return ServerUrlHelper
     */
    public function getServerUrlHelper(): ServerUrlHelper
    {
        return $this->serverUrlHelper;
    }

    /**
     * @param ServerUrlHelper $serverUrlHelper
     */
    public function setServerUrlHelper(ServerUrlHelper $serverUrlHelper)
    {
        $this->serverUrlHelper = $serverUrlHelper;
    }
}
