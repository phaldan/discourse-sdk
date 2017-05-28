<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class AuthenticationSpy extends AuthenticationDummy
{
    public $http;
    public $request;

    public function setHttp(HttpAdapter $http): Authentication
    {
        $this->http = $http;

        return parent::setHttp($http);
    }

    public function send(RequestInterface $request): PromiseInterface
    {
        $this->request = $request;

        return parent::send($request);
    }
}
