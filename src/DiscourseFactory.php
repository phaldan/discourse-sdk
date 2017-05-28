<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\HttpAdapter;
use PhALDan\Discourse\Client\RestAsyncFactory;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface DiscourseFactory
{
    /**
     * Create REST API client.
     *
     * @param string    $url
     * @param HttpAdapter|null $auth
     * @param HttpAdapter|null $http
     *
     * @return RestAsyncFactory
     */
    public function rest(string $url, HttpAdapter $auth = null, HttpAdapter $http = null): RestAsyncFactory;
}
