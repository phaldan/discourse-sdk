<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\Authentication;
use PhALDan\Discourse\Client\GuzzleHttp;
use PhALDan\Discourse\Client\HttpAdapter;
use PhALDan\Discourse\Client\RestAsync;
use PhALDan\Discourse\Client\RestAsyncFactory;
use PhALDan\Discourse\Client\RestSync;
use PhALDan\Discourse\Client\RestSyncFactory;

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

    public function restAsync(string $url, HttpAdapter $auth = null, HttpAdapter $http = null): RestAsyncFactory
    {
        $httpAdapter = $http ?? new GuzzleHttp();
        $authDecorator = ($auth === null) ? $httpAdapter : $this->processAuth($auth, $httpAdapter);

        return $this->createRest($url, $authDecorator);
    }

    public function rest(string $url, HttpAdapter $auth = null, HttpAdapter $http = null): RestSyncFactory
    {
        return new RestSync($this->restAsync($url, $auth, $http));
    }

    private function processAuth(HttpAdapter $auth, HttpAdapter $http): HttpAdapter
    {
        return ($auth instanceof Authentication) ? $auth->setHttp($http) : $auth;
    }

    private function createRest(string $url, HttpAdapter $auth): RestAsyncFactory
    {
        return $this->rest ?? new RestAsync($url, $auth);
    }
}
