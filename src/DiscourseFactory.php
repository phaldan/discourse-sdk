<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\HttpAdapter;
use PhALDan\Discourse\Client\RestAsyncFactory;
use PhALDan\Discourse\Client\RestSyncFactory;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface DiscourseFactory
{
    /**
     * Create asynchronous REST API client.
     *
     * @param string           $url
     * @param HttpAdapter|null $auth
     * @param HttpAdapter|null $http
     *
     * @return RestAsyncFactory
     */
    public function restAsync(string $url, HttpAdapter $auth = null, HttpAdapter $http = null): RestAsyncFactory;

    /**
     * Create REST API client.
     *
     * @param string           $url
     * @param HttpAdapter|null $auth
     * @param HttpAdapter|null $http
     *
     * @return RestSyncFactory
     */
    public function rest(string $url, HttpAdapter $auth = null, HttpAdapter $http = null): RestSyncFactory;
}
