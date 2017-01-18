<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 10/3/2016
 * Time: 9:00 PM
 */

namespace Dot\Helpers\Route;

use Psr\Http\Message\UriInterface;

/**
 * Class UriHelperTrait
 * @package Dot\Helpers\Route
 */
trait UriHelperTrait
{
    /**
     * @param UriInterface $toUri
     * @param mixed $param
     * @param string $paramName
     * @return UriInterface
     */
    public function appendQueryParam(UriInterface $toUri, $param, $paramName)
    {
        $query = $toUri->getQuery();
        $arr = [];
        if (!empty($query)) {
            parse_str($query, $arr);
        }

        $query = http_build_query(
            array_merge($arr, [$paramName => urlencode($param)])
        );

        $uri = $toUri->withQuery($query);
        return $uri;
    }
}
