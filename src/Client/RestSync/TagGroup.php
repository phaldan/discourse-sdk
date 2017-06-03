<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for TagGroupAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class TagGroup implements TagGroupSync
{
    /**
     * @var TagGroupAsync
     */
    private $client;

    /**
     * TagGroup constructor.
     *
     * @param TagGroupAsync $client
     */
    public function __construct(TagGroupAsync $client)
    {
        $this->client = $client;
    }

    public function create(array $attributes): ResponseInterface
    {
        return $this->client->create($attributes)->wait();
    }

    public function list(): ResponseInterface
    {
        return $this->client->list()->wait();
    }

    public function single(int $id): ResponseInterface
    {
        return $this->client->single($id)->wait();
    }

    public function update(int $id, array $attributes): ResponseInterface
    {
        return $this->client->update($id, $attributes)->wait();
    }
}
