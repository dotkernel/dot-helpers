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
 * Class HttpMessagesAwareTrait
 * @package Dot\Helpers\Psr7
 */
trait HttpMessagesAwareTrait
{
    /** @var  ServerRequestInterface */
    protected $request;

    /** @var  ResponseInterface */
    protected $response;

    /**
     * @return ServerRequestInterface
     */
    public function getServerRequest()
    {
        return $this->request;
    }

    /**
     * @param ServerRequestInterface $request
     * @return HttpMessagesAwareTrait
     */
    public function setServerRequest(ServerRequestInterface $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     * @return HttpMessagesAwareTrait
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
        return $this;
    }


}