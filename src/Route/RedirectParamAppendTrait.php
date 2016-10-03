<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 10/3/2016
 * Time: 9:00 PM
 */

namespace Dot\Helpers\Route;

use Psr\Http\Message\UriInterface;

trait RedirectParamAppendTrait
{
    /**
     * @param UriInterface $uri
     * @param UriInterface $wantedUri
     * @param string $paramName
     * @return UriInterface|static
     */
    public function appendWantedUrl(UriInterface $uri, UriInterface $wantedUri, $paramName = 'redirect')
    {
        $query = $uri->getQuery();
        $arr = [];
            if (!empty($query)) {
                parse_str($query, $arr);
            }

            $query = http_build_query(
                array_merge($arr, [$paramName => urlencode($wantedUri)])
            );

            $uri = $uri->withQuery($query);
            return $uri;
    }
}