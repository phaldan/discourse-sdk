<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Discourse API endpoints for interaction with plugins.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface PluginAsync
{
    /**
     * Retrieve a list of all plugins.
     * More information on http://docs.discourse.org/#tag/Plugins%2Fpaths%2F~1admin~1plugins%2Fget.
     *
     * @return PromiseInterface
     */
    public function list(): PromiseInterface;
}
