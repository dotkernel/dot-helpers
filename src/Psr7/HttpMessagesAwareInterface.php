<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
 */

declare(strict_types=1);

namespace Dot\Helpers\Psr7;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface HttpMessagesAwareInterface
 * @package Dot\Helpers\Psr7
 */
interface HttpMessagesAwareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return mixed
     */
    public function setServerRequest(ServerRequestInterface $request);

    /**
     * @return ServerRequestInterface
     */
    public function getServerRequest() : ServerRequestInterface;

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function setResponse(ResponseInterface $response);

    /**
     * @return ResponseInterface
     */
    public function getResponse() : ResponseInterface;
}
