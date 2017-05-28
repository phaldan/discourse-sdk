<?php

namespace PhALDan\Discourse\Client;

use PhALDan\Discourse\Client\Rest\HttpAdapterDummy;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class AuthenticationDummy extends HttpAdapterDummy implements Authentication
{
    public function setHttp(HttpAdapter $http): Authentication
    {
        return $this;
    }
}
