<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Test dummy of Guzzle ClientInterface.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class GuzzleClientDummy implements ClientInterface
{
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return new ResponseDummy();
    }

    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return new PromiseDummy();
    }

    public function request($method, $uri, array $options = []): ResponseInterface
    {
        return new ResponseDummy();
    }

    public function requestAsync($method, $uri, array $options = []): PromiseInterface
    {
        return new PromiseDummy();
    }

    public function getConfig($option = null)
    {
        return null;
    }
}
