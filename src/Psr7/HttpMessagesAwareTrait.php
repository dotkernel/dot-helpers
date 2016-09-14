<?php
/**
 * Created by PhpStorm.
 * User: n3vrax
 * Date: 9/14/2016
 * Time: 11:17 PM
 */

namespace Dot\Helpers\Psr7;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

trait HttpMessagesAwareTrait
{
    /** @var  ServerRequestInterface */
    protected $request;

    /** @var  ResponseInterface */
    protected $response;

    /**
     * @return ServerRequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param ServerRequestInterface $request
     * @return HttpMessagesAwareTrait
     */
    public function setRequest($request)
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
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }


}