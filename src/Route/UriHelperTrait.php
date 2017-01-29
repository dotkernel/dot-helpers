<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 10/3/2016
 * Time: 9:00 PM
 */

declare(strict_types=1);

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
     * @param string $name
     * @param string $value
     * @return UriInterface
     */
    public function appendQueryParam(UriInterface $toUri, string $name, string $value) : UriInterface
    {
        $query = $toUri->getQuery();
        $arr = [];
        if (! empty($query)) {
            parse_str($query, $arr);
        }

        $query = http_build_query(
            array_merge($arr, [$name => urlencode($value)])
        );

        $uri = $toUri->withQuery($query);
        return $uri;
    }
}
