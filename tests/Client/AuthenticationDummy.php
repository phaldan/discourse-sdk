<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\HttpDummy;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class AuthenticationDummy extends HttpDummy implements Authentication
{
    public function setHttp(Http $http): Authentication
    {
        return $this;
    }
}
