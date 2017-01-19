<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
 */

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
     * @param $route
     * @return UriInterface
     */
    public function getUri($route)
    {
        $params = [];
        $queryParams = [];
        if (is_string($route)) {
            $routeName = $route;
        } elseif (is_array($route)) {
            $routeName = isset($route['name']) ? $route['name'] : null;
            $params = isset($route['params']) ? $route['params'] : [];
            $queryParams = isset($route['query_params']) ? $route['query_params'] : [];
        }
        if (empty($routeName) || !is_string($routeName)) {
            throw new \RuntimeException('Invalid route option');
        }
        $uri = new Uri($this->serverUrlHelper->generate($this->urlHelper->generate($routeName, $params)));
        if (!empty($queryParams)) {
            $query = http_build_query($queryParams);
            $uri = $uri->withQuery($query);
        }
        return $uri;
    }

    /**
     * @param $route
     * @return mixed|null
     */
    public function getRouteName($route)
    {
        if (is_string($route)) {
            return $route;
        } elseif (is_array($route)) {
            return isset($route['name']) ? $route['name'] : null;
        }
        return null;
    }

    /**
     * @return UrlHelper
     */
    public function getUrlHelper()
    {
        return $this->urlHelper;
    }

    /**
     * @param UrlHelper $urlHelper
     * @return RouteOptionHelper
     */
    public function setUrlHelper($urlHelper)
    {
        $this->urlHelper = $urlHelper;
        return $this;
    }

    /**
     * @return ServerUrlHelper
     */
    public function getServerUrlHelper()
    {
        return $this->serverUrlHelper;
    }

    /**
     * @param ServerUrlHelper $serverUrlHelper
     * @return RouteOptionHelper
     */
    public function setServerUrlHelper($serverUrlHelper)
    {
        $this->serverUrlHelper = $serverUrlHelper;
        return $this;
    }
}
