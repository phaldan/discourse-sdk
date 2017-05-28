<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Interface for handling http request and response.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface HttpAdapter
{
    /**
     * @param RequestInterface $request
     *
     * @return PromiseInterface
     */
    public function send(RequestInterface $request): PromiseInterface;
}
