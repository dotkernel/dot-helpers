<?php
/**
 * @copyright: DotKernel
 * @library: dotkernel/dot-helpers
 * @author: n3vrax
 * Date: 9/6/2016
 * Time: 7:49 PM
 */

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
     * @return $this
     */
    public function setServerRequest(ServerRequestInterface $request);

    /**
     * @return ServerRequestInterface
     */
    public function getServerRequest();

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    public function setResponse(ResponseInterface $response);

    /**
     * @return ResponseInterface
     */
    public function getResponse();
}
