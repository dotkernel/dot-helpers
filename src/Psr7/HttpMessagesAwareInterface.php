<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 9/14/2016
 * Time: 11:14 PM
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