<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\TagAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for TagAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Tag implements TagSync
{
    /**
     * @var TagAsync
     */
    private $client;

    /**
     * Tag constructor.
     *
     * @param TagAsync $client
     */
    public function __construct(TagAsync $client)
    {
        $this->client = $client;
    }

    public function list(): ResponseInterface
    {
        return $this->client->list()->wait();
    }

    public function single(string $name): ResponseInterface
    {
        return $this->client->single($name)->wait();
    }
}
