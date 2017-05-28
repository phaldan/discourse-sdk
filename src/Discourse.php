<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\Authentication;
use PhALDan\Discourse\Client\GuzzleHttp;
use PhALDan\Discourse\Client\Http;
use PhALDan\Discourse\Client\RestAsync;
use PhALDan\Discourse\Client\RestAsyncFactory;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Discourse implements DiscourseFactory
{
    /**
     * @var ?RestAsyncFactory
     */
    private $rest = null;

    /**
     * @param RestAsyncFactory $rest
     *
     * @return Discourse
     */
    public function setRest(RestAsyncFactory $rest): Discourse
    {
        $this->rest = $rest;

        return $this;
    }

    public function rest(string $url, Http $auth = null, Http $http = null): RestAsyncFactory
    {
        $httpAdapter = $http ?? new GuzzleHttp();
        $authDecorator = ($auth === null) ? $httpAdapter : $this->processAuth($auth, $httpAdapter);

        return $this->createRest($url, $authDecorator);
    }

    private function processAuth(Http $auth, Http $http): Http
    {
        return ($auth instanceof Authentication) ? $auth->setHttp($http) : $auth;
    }

    private function createRest(string $url, Http $auth): RestAsyncFactory
    {
        return $this->rest ?? new RestAsync($url, $auth);
    }
}
