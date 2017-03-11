<?php
/**
 * @see https://github.com/dotkernel/dot-helpers/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-helpers/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

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
    public function appendQueryParam(UriInterface $toUri, string $name, string $value): UriInterface
    {
        $query = $toUri->getQuery();
        $arr = [];
        if (!empty($query)) {
            parse_str($query, $arr);
        }

        $query = http_build_query(
            array_merge($arr, [$name => urlencode($value)])
        );

        $uri = $toUri->withQuery($query);
        return $uri;
    }
}
