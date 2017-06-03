<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\PluginAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for NotificationAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Plugin implements PluginSync
{
    /**
     * @var PluginAsync
     */
    private $client;

    /**
     * Plugin constructor.
     *
     * @param PluginAsync $client
     */
    public function __construct(PluginAsync $client)
    {
        $this->client = $client;
    }

    public function list(): ResponseInterface
    {
        return $this->client->list()->wait();
    }
}
