<?php

namespace PhALDan\Discourse\Client;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface Authentication extends HttpAdapter
{
    /**
     * @param HttpAdapter $http
     *
     * @return Authentication
     */
    public function setHttp(HttpAdapter $http): Authentication;
}
