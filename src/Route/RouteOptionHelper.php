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
     * @param $routeOption
     * @param bool $absoluteUri
     * @return UriInterface
     */
    public function getUri($routeOption, $absoluteUri = true)
    {
        $routeName = null;
        $routeParams = [];
        $queryParams = [];
        $fragmentIdentifier = null;
        $options = [];
        if (is_string($routeOption)) {
            $routeName = $routeOption;
        } elseif (is_array($routeOption)) {
            $routeName = isset($routeOption['route_name']) ? $routeOption['route_name'] : null;
            $routeParams = isset($routeOption['route_params']) ? $routeOption['route_params'] : [];
            $queryParams = isset($routeOption['query_params']) ? $routeOption['query_params'] : [];

            $fragmentIdentifier = isset($routeOption['fragment_identifier'])
                ? $routeOption['fragment_identifier']
                : null;

            $options = isset($routeOption['options']) && is_array($routeOption['options'])
                ? $routeOption['options']
                : [];
        }

        if (empty($routeName) || !is_string($routeName)) {
            throw new \RuntimeException('Invalid route name option');
        }

        if ($absoluteUri) {
            $uri = new Uri(
                $this->serverUrlHelper->generate(
                    $this->urlHelper->generate(
                        $routeName,
                        $routeParams,
                        $queryParams,
                        $fragmentIdentifier,
                        $options
                    )
                )
            );
        } else {
            $uri = new Uri(
                $this->urlHelper->generate(
                    $routeName,
                    $routeParams,
                    $queryParams,
                    $fragmentIdentifier,
                    $options
                )
            );
        }

        return $uri;
    }

    /**
     * @param $routeOption
     * @return mixed|null
     */
    public function getRouteName($routeOption)
    {
        if (is_string($routeOption)) {
            return $routeOption;
        } elseif (is_array($routeOption)) {
            return isset($routeOption['route_name']) ? $routeOption['route_name'] : null;
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
