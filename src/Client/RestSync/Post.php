<?php

namespace PhALDan\Discourse\Client\RestSync;

use PhALDan\Discourse\Client\RestAsync\PostAsync;
use Psr\Http\Message\ResponseInterface;

/**
 * Wrapper for PostAsync to force synchronous execution.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
final class Post implements PostSync
{
    /**
     * @var PostAsync
     */
    private $client;

    /**
     * Post constructor.
     *
     * @param PostAsync $client
     */
    public function __construct(PostAsync $client)
    {
        $this->client = $client;
    }

    public function create(array $attributes): ResponseInterface
    {
        return $this->client->create($attributes)->wait();
    }

    public function like(array $attributes): ResponseInterface
    {
        return $this->client->like($attributes)->wait();
    }

    public function single(int $id): ResponseInterface
    {
        return $this->client->single($id)->wait();
    }

    public function unlike(int $id, array $attributes): ResponseInterface
    {
        return $this->client->unlike($id, $attributes)->wait();
    }

    public function update(int $id, array $attributes): ResponseInterface
    {
        return $this->client->update($id, $attributes)->wait();
    }
}
