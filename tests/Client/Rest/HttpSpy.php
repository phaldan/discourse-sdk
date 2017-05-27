<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpSpy extends HttpDummy
{
    /**
     * @var RequestInterface
     */
    public $request;

    public function send(RequestInterface $request): PromiseInterface
    {
        $this->request = $request;

        return parent::send($request);
    }
}
