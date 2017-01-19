<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
 */

namespace Dot\Helpers\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class NotFound
 * Specifically send a 404 error to the error middleware pipe, if reached
 * By default is registered right under normal middleware, and before error handlers, at priority -1
 *
 * @package Dot\Helpers\Middleware
 */
class NotFound
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        return $next($request, $response->withStatus(404), 'Page not found');
    }
}
