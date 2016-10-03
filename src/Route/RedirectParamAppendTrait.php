<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 10/3/2016
 * Time: 9:00 PM
 */

namespace Dot\Helpers\Route;

use Zend\Diactoros\Uri;

trait RedirectParamAppendTrait
{
    /**
     * @param Uri $uri
     * @param Uri $wantedUri
     * @param string $paramName
     * @return Uri|static
     */
    public function appendWantedUrl(Uri $uri, Uri $wantedUri, $paramName = 'redirect')
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