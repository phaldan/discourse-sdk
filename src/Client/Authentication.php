<?php

namespace PhALDan\Discourse\Client;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface Authentication extends Http
{
    /**
     * @param Http $http
     *
     * @return Authentication
     */
    public function setHttp(Http $http): Authentication;
}
