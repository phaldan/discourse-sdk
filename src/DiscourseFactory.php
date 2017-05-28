<?php

namespace PhALDan\Discourse;

use PhALDan\Discourse\Client\Http;
use PhALDan\Discourse\Client\RestAsyncInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface DiscourseFactory
{
    /**
     * Create REST API client.
     *
     * @param string    $url
     * @param Http|null $auth
     * @param Http|null $http
     *
     * @return RestAsyncInterface
     */
    public function rest(string $url, Http $auth = null, Http $http = null): RestAsyncInterface;
}
