<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Plugin extends HttpClient implements PluginAsync
{
    public function list(): PromiseInterface
    {
        return $this->client()->get(RouteConstants::PLUGIN_LIST);
    }
}
