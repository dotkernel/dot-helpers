<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
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
class RouteOptionHelper
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
     * @param array $routeOptions
     * @return UriInterface
     */
    public function getUri(array $routeOptions): UriInterface
    {
        $routeName = $routeOptions['route_name'] ?? '';
        $routeParams = $routeOptions['route_params'] ?? [];
        $queryParams = $routeOptions['query_params'] ?? [];

        if (empty($routeName) || !is_string($routeName)) {
            throw new \RuntimeException('Invalid route name option');
        }
        $uri = new Uri($this->serverUrlHelper->generate($this->urlHelper->generate($routeName, $routeParams)));
        if (!empty($queryParams)) {
            $query = http_build_query($queryParams);
            $uri = $uri->withQuery($query);
        }
        return $uri;
    }

    /**
     * @param array $routeOptions
     * @return string
     */
    public function getRouteName(array $routeOptions): string
    {
        return isset($routeOptions['route_name']) && is_string($routeOptions['route_name'])
            ? $routeOptions['route_name'] : '';
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
