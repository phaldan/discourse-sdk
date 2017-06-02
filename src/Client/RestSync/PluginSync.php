<?php

namespace PhALDan\Discourse\Client\RestSync;

use Psr\Http\Message\ResponseInterface;

/**
 * Discourse API endpoints for interaction with plugins.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface PluginSync
{
    /**
     * Retrieve a list of all plugins.
     * More information on http://docs.discourse.org/#tag/Plugins%2Fpaths%2F~1admin~1plugins%2Fget.
     *
     * @return ResponseInterface
     */
    public function list(): ResponseInterface;
}
