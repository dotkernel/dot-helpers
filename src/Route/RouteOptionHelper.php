<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 9/22/2016
 * Time: 6:52 PM
 */

namespace Dot\Helpers\Route;


use Zend\Diactoros\Uri;
use Zend\Expressive\Helper\UrlHelper;

/**
 * Class RouteOptionHelper
 * @package Dot\Helpers\Route
 */
class RouteOptionHelper
{
    /** @var  UrlHelper */
    protected $urlHelper;

    /**
     * RouteOptionHelper constructor.
     * @param UrlHelper $urlHelper
     */
    public function __construct(UrlHelper $urlHelper)
    {
        $this->urlHelper = $urlHelper;
    }

    /**
     * @param $route
     * @return Uri|static
     */
    public function getUri($route)
    {
        $params = [];
        $queryParams = [];
        if(is_string($route)) {
            $routeName = $route;
        }
        elseif(is_array($route)) {
            $routeName = isset($route['name']) ? $route['name'] : null;
            $params = isset($route['params']) ? $route['params'] : [];
            $queryParams = isset($route['query_params']) ? $route['query_params'] : [];
        }

        if (empty($routeName) || !is_string($routeName)) {
            throw new \RuntimeException('Invalid route option');
        }

        $uri = new Uri($this->urlHelper->generate($routeName, $params));
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

    
}