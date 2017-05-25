<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class Plugins extends HttpClient
{
    /**
     * Retrieve a list of all plugins.
     * More information on http://docs.discourse.org/#tag/Plugins%2Fpaths%2F~1admin~1plugins%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::PLUGIN_LIST);
    }
}
